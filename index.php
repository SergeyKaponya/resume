<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Analyzer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.7.0/css/uikit.min.css" />
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="uk-container">
        <h1 class="uk-heading-divider">Resume Analyzer</h1>
        <form id="resume-form" class="uk-form-stacked">
            <div class="uk-margin">
                <label class="uk-form-label" for="resume">Paste your resume text here:</label>
                <div class="uk-form-controls">
                    <textarea class="uk-textarea" id="resume" name="resume" rows="10"></textarea>
                </div>
            </div>
            <button class="uk-button uk-button-primary" type="submit">Analyze</button>
        </form>
        <div id="results" class="uk-margin">
            <div id="loading" class="uk-flex uk-flex-center" hidden>
                <div uk-spinner="ratio: 2"></div>
            </div>
            <div id="recommendations"></div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.7.0/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.7.0/js/uikit-icons.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
