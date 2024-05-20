from flask import Flask, request, jsonify, send_file
import cv2
import numpy as np
from PIL import Image, ImageDraw
import io

app = Flask(__name__)

@app.route('/')
def index():
    return '''
    <h1>Annotation API: Bounding Boxes</h1>
    <form action="/annotate_bounding_box" method="post" enctype="multipart/form-data">
      <label for="file">Choose an image:</label>
      <input type="file" id="file" name="file">
      <button type="submit">Upload and Annotate</button>
    </form>
    '''

@app.route('/annotate_bounding_box', methods=['POST'])
def annotate_bounding_box():
    file = request.files['file']
    image = Image.open(file.stream)
    image_cv = np.array(image)
    annotated_image = annotate_bounding_box(image_cv)
    return send_annotated_image(annotated_image)

def annotate_bounding_box(image):
    # Example bounding box (x, y, width, height)
    x, y, w, h = 40, 40, 200, 200
    cv2.rectangle(image, (x, y), (x + w, y + h), (0, 255, 0), 2)
    return image

def send_annotated_image(image):
    pil_img = Image.fromarray(cv2.cvtColor(image, cv2.COLOR_BGR2RGB))
    img_io = io.BytesIO()
    pil_img.save(img_io, 'JPEG')
    img_io.seek(0)
    return send_file(img_io, mimetype='image/jpeg')

if __name__ == '__main__':
    app.run(debug=True)
