import socket

s = socket.socket();
ipaddr = '10.145.123.134'
port = 56789
s.connect((ipaddr, port))
print("connected successfully")
s.send(" ".encode())
 
while True:
    data2 = s.recv(1024).decode('utf-8')
    data = input("Sever = "+ data2 +" : ")
    if data == 'exit':
        s.close()
        break
    else:
     	s.send(data.encode())
     	
   
       
print("Disconnected")


