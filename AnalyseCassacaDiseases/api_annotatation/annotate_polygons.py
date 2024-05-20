from flask import Flask, request, jsonify
import cv2
import numpy as np
import base64

app = Flask(__name__)

@app.route('/')
def index():
    return '''
    <h1>Annotation API: Polygones</h1>
    <p>Send a POST request with JSON containing 'image' field.</p>
    '''

@app.route('/annotate_polygons', methods=['POST'])
def annotate_polygons():
    data = request.json
    if 'image' in data:
        image_data = base64.b64decode(data['image'])
        image_np = np.frombuffer(image_data, dtype=np.uint8)
        image_cv = cv2.imdecode(image_np, cv2.IMREAD_COLOR)
        annotated_image = perform_polygon_annotation(image_cv)
        return jsonify({'annotated_image': annotated_image})
    else:
        return jsonify({'error': 'No image provided'})

def perform_polygon_annotation(image):
    # Your polygon annotation code goes here
    # This is just a placeholder example
    # For example, you can find contours and draw them as polygons
    gray_image = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    _, thresh = cv2.threshold(gray_image, 127, 255, cv2.THRESH_BINARY)
    contours, _ = cv2.findContours(thresh, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_SIMPLE)
    annotated_image = image.copy()
    for contour in contours:
        epsilon = 0.03 * cv2.arcLength(contour, True)
        approx = cv2.approxPolyDP(contour, epsilon, True)
        annotated_image = cv2.polylines(annotated_image, [approx], True, (0, 255, 0), 3)
    _, buffer = cv2.imencode('.jpg', annotated_image)
    return base64.b64encode(buffer).decode('utf-8')

if __name__ == '__main__':
    app.run(debug=True)
