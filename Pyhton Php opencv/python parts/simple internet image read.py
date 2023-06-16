import cv2
#from google.colab.patches import cv2_imshow
from urllib.request import urlopen #install urlib3
import numpy as np

image_url = "http://localhost/upload/image.png?random="+ str(56789)
resp = urlopen(image_url)
image = np.asarray(bytearray(resp.read()), dtype="uint8")
image = cv2.imdecode(image, cv2.IMREAD_COLOR) # The image object

# Optional: For testing & viewing the image for google colab
#cv2_imshow(image)

cv2.imshow('URL Image', image)
cv2.waitKey(0)
cv2.destroyAllWindows()
