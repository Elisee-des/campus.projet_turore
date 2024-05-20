from flask import Flask, request, send_file
import cv2
import numpy as np
from PIL import Image
import io

app = Flask(__name__)

@app.route('/')
def index():
    return '''
    <h1>Annotation API: Polygons</h1>
    <form action="/annotate_polygons" method="post" enctype="multipart/form-data">
      <label for="file">Choose an image:</label>
      <input type="file" id="file" name="file">
      <button type="submit">Upload and Annotate</button>
    </form>
    '''

@app.route('/annotate_polygons', methods=['POST'])
def annotate_polygons():
    file = request.files['file']
    image = Image.open(file.stream)
    image_cv = np.array(image)
    annotated_image = annotate_polygons(image_cv)
    return send_annotated_image(annotated_image)

def annotate_polygons(image):
    points = np.array([[100, 50], [200, 50], [200, 150], [100, 150]])
    cv2.polylines(image, [points], isClosed=True, color=(255, 0, 0), thickness=2)
    return image

def send_annotated_image(image):
    pil_img = Image.fromarray(cv2.cvtColor(image, cv2.COLOR_BGR2RGB))
    img_io = io.BytesIO()
    pil_img.save(img_io, 'JPEG')
    img_io.seek(0)
    return send_file(img_io, mimetype='image/jpeg')

if __name__ == '__main__':
    app.run(debug=True)
