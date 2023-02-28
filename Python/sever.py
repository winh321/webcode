import socket

s  = socket.socket();
print("Sockect successfully created")
port = 56789
s.bind(('',port))
print(f'sockect binded to port {port}')
s.listen(5)
print("socket is listening")

while True:
    c,addr = s.accept()
    print("Got connect from",addr)
    
    while True:
    	data2 = c.recv(1024).decode('utf-8')
    	data = input("Client = "+ data2 + " : ")
    	if data == "exit":
    		c.close()
    		break
    	else:
    		c.send(bytes(data,'utf-8'))

    		
print('Disconnected')	
