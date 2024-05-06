import argparse
import requests
import time
from urllib.parse import urlparse, urlunparse, urlencode, parse_qs

# Flags e argumentos
parser = argparse.ArgumentParser(description='Alterar os parametros')
# Adicionar os argumentos posicionais com o metodo add_argument()
parser.add_argument('-p', '--payload', type=str, help='Payload a ser substituido em parametros: -p "><script>alert(1)</script><"')
parser.add_argument('-w', '--wordlist', type=str, help="Wordlist com as urls: -w urls.txt")
parser.add_argument('-s', '--time', type=int, help="Tempo entre as requisicoes")

args = parser.parse_args()


def analisar_urls(url, payload):
    # Analisar a url
    url_analysis = urlparse(url)
    params = parse_qs(url_analysis.query)

    # Modificando valor do parametro
    for loop_params in params.keys():
        params[loop_params] = [payload]

    # Montar URL
    url_analysis = url_analysis._replace(query=urlencode(params, doseq=True))
    new_url = urlunparse(url_analysis)
    #print(new_url)

    file = open("Urls_vulnerables_xss.txt", "a")
    file.write(f"{new_url}\n\n")
    file.close()


with open(args.wordlist, "r") as urls_xss:
    for loop_urls in urls_xss:
        # Formatando url
        format_url = loop_urls.strip()
        #print(format_url)

        # Analisar URLs
        analisar_urls(format_url, args.payload)
