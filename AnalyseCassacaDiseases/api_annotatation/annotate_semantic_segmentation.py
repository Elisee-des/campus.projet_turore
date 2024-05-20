from flask import Flask, request, jsonify
import cv2
import numpy as np
import base64

app = Flask(__name__)

@app.route('/')
def index():
    return '''
    <h1>Annotation API: Semantic Segmentation</h1>
    <p>Send a POST request with JSON containing 'image' field.</p>
    '''

@app.route('/annotate_semantic_segmentation', methods=['POST'])
def annotate_semantic_segmentation():
    data = request.json
    if 'image' in data:
        image_data = base64.b64decode(data['image'])
        image_np = np.frombuffer(image_data, dtype=np.uint8)
        image_cv = cv2.imdecode(image_np, cv2.IMREAD_COLOR)
        annotated_image = perform_semantic_segmentation(image_cv)
        return jsonify({'annotated_image': annotated_image})
    else:
        return jsonify({'error': 'No image provided'})

def perform_semantic_segmentation(image):
    # Your semantic segmentation annotation code goes here
    # This is just a placeholder example
    # For example, you can simply convert the image to grayscale
    gray_image = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    _, buffer = cv2.imencode('.jpg', gray_image)
    return base64.b64encode(buffer).decode('utf-8')

if __name__ == '__main__':
    app.run(debug=True)
