from flask import Flask, request
from pizzaIdentifier import getScores


app = Flask(__name__)

@app.route("/")
def analyzeImage():
    imageFile = request.args.get('imageFile')
    scores = getScores(imageFile)
    return '''<h1>{}</h1>'''.format(scores['pepperonipizza'])