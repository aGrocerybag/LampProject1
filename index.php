<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <title>CSV file Upload</title>
</head>
<body>
    <div id="component">
        <a href ="https://en.wikipedia.org/wiki/Microwave_transmission">Click here to learn more </a><br/>
        <a href ="https://github.com/aGrocerybag/LampProject1">Github </a>
        <h1>Microwave</h1>
    <div id="component2">
    <img src="./image/wave.gif" id="headerIMG"/>
    </div>
    <div id="component3">
    <p>
    Microwaves are a form of electromagnetic radiation with wavelengths ranging from about one meter to one millimeter; with frequencies between 300 MHz (1 m) and 300 GHz (1 mm). Different sources define different frequency ranges as microwaves; the above broad definition includes both UHF and EHF (millimeter wave) bands. A more common definition in radio engineering is the range between 1 and 100 GHz (wavelengths between 0.3 m and 3 mm).[2] In all cases, microwaves include the entire SHF band (3 to 30 GHz, or 10 to 1 cm) at minimum. Frequencies in the microwave range are often referred to by their IEEE radar band designations: S, C, X, Ku, K, or Ka band, or by similar NATO or EU designations. 
    </p>
    </div>
    <div id ="component4">
    <h1>CSV Upload</h1>
    <p> To use the .CSV uploader:
        click on the browse button below to choose a .csv format microwave path file, 
        click the submit button to upload the .csv file. Note the file must be .csv format and the
        content of the file must not be empty, each file uploaded should have a limited file size of 20mb.
    </P>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
     <input type="file" name="file">
     <input type="submit" name="sumbmitFile">
    </div>
</div>          
</body>
</html>
