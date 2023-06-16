import time
import random
import cv2
#from google.colab.patches import cv2_imshow
from urllib.request import urlopen
import numpy as np

def reload():
    randomnum = random.randint(0,200000)
    print(randomnum)
    image_url = ("http://localhost/upload/image.png?random="+ str(randomnum))
    resp = urlopen(image_url)
    frame1 = np.asarray(bytearray(resp.read()), dtype="uint8")
    frame1 = cv2.imdecode(frame1, cv2.IMREAD_COLOR)  # The image object

    randomnum2 = random.randint(0, 200000)
    print(randomnum2)
    image_url = ("http://localhost/upload/image.png?random=" + str(randomnum2))
    resp2 = urlopen(image_url)
    frame2 = np.asarray(bytearray(resp2.read()), dtype="uint8")
    frame2 = cv2.imdecode(frame2, cv2.IMREAD_COLOR)  # The image object

    diff = cv2.absdiff(frame1, frame2)
    gray = cv2.cvtColor(diff, cv2.COLOR_RGB2GRAY)
    blur = cv2.GaussianBlur(gray, (5, 5), 0)
    _, thresh = cv2.threshold(blur, 20, 255, cv2.THRESH_BINARY)
    dilated = cv2.dilate(thresh, None, iterations=3)
    contours, _ = cv2.findContours(dilated, cv2.RETR_TREE, cv2.CHAIN_APPROX_SIMPLE)
    #cv2.drawContours(frame1, contours, -1, (0, 255, 0), 2)
    for c in contours:
        if cv2.contourArea(c) < 2000:
            continue
        x, y, w, h = cv2.boundingRect(c)
        cv2.rectangle(frame1, (x, y), (x + w, y + h), (0, 255, 0), 2)

    cv2.imshow('Image', frame1)
    cv2.waitKey(1)

while True:
    reload()
    time.sleep(0.05)
