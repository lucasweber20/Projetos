import nmap
import sys


print("="*29)
print(""""
     ,            ,
    /             \                                                                                                                                          
   ((__---,,,---__))                                                                                                                                         
      (_) O O (_)_________                                                                                                                                   
         \ _ /            |\                                                                                                                                 
          o_o \   M U U   | \                                                                                                                                
               \   _____  |  *                          
                |||   WW|||                                                                                                       
                |||     |||       """)
print("="*30)
target = sys.argv[1]

port_A = int(input("Primeira porta: "))
port_B = int(input("Ultima porta: "))

scan_ip = nmap.PortScanner()

for loop_port in range(port_A, port_B + 1):
    try:
        print("="*30)
        scan_done = scan_ip.scan(target, str(loop_port))

        state_port = scan_done["scan"][target]["tcp"][loop_port]["state"]
        name_service = scan_done["scan"][target]["tcp"][loop_port]["name"]
        product = scan_done["scan"][target]["tcp"][loop_port]["product"]
        version = scan_done["scan"][target]["tcp"][loop_port]["version"]
        extrainfo = scan_done["scan"][target]["tcp"][loop_port]["extrainfo"]

        if state_port == "open":
            print(f"\033[32m{name_service} {state_port}: {loop_port}\033[m")
            print(f"\033[32m{product} {version} {extrainfo}\033[m")
        else:
            print(f"\033[31m{name_service} {state_port}: {loop_port}\033[m")

    except:
        print("Algum erro ocorreu!")
