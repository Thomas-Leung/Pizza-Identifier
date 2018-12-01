from flask import Flask, request, jsonify
from pizzaIdentifier import getScores
import operator


app = Flask(__name__)

@app.route("/")
def analyzeImage():
    imageFile = request.args.get('imageFile')
    scores = getScores('/opt/lampp/htdocs/uploadfile/upload/' + imageFile)
    pizzaEstimate = max(scores.items(), key=operator.itemgetter(1))[0]
    return pizzaEstimate
