from flask import Flask, request, send_file
import cv2
import numpy as np
from PIL import Image
import io

app = Flask(__name__)

@app.route('/')
def index():
    return '''
    <h1>Annotation API: Semantic Segmentation</h1>
    <form action="/annotate_semantic_segmentation" method="post" enctype="multipart/form-data">
      <label for="file">Choose an image:</label>
      <input type="file" id="file" name="file">
      <button type="submit">Upload and Annotate</button>
    </form>
    '''

@app.route('/annotate_semantic_segmentation', methods=['POST'])
def annotate_semantic_segmentation():
    file = request.files['file']
    image = Image.open(file.stream)
    image_cv = np.array(image)
    annotated_image = annotate_semantic_segmentation(image_cv)
    return send_annotated_image(annotated_image)

def annotate_semantic_segmentation(image):
    gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    _, mask = cv2.threshold(gray, 128, 255, cv2.THRESH_BINARY)
    image[mask == 255] = [0, 255, 0]
    return image

def send_annotated_image(image):
    pil_img = Image.fromarray(cv2.cvtColor(image, cv2.COLOR_BGR2RGB))
    img_io = io.BytesIO()
    pil_img.save(img_io, 'JPEG')
    img_io.seek(0)
    return send_file(img_io, mimetype='image/jpeg')

if __name__ == '__main__':
    app.run(debug=True)
