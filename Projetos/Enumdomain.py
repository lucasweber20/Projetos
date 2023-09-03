import requests
import time
import sys


print("="*30)
print("""
 ______________
/ Subdomains!!!\                                                                                                                     
\              /                                                                                                                     
 --------------                                                                                                                      
 \                                                                                                                                                           
  \                                                                                                                                                          
     __                                                                                                                                                      
    /  \                                                                                                                                                     
    |  |                                                                                                                                                     
    @  @                                                                                                                                                     
    |  |                                                                                                                                                     
    || |/                                                                                                                                                    
    || ||                                                                                                                                                    
    |\_/|                                                                                                                                                    
    \___/""")
print("="*30)

with open (sys.argv[2], "r") as words:
    
    for loop in range(0,4,1):
        read_file = words.readline()
        strip_file = read_file.strip()

        clean_url = f"{sys.argv[1]}{strip_file}"

        time.sleep(3)

        request_url = requests.get(clean_url)
        status_code_url = str(request_url.status_code)

        if status_code_url == "200":
            print(f"\033[32m{clean_url}: 200\033[m")
        else:
            print(f"{clean_url}: {status_code_url}")

        print("="*30)
