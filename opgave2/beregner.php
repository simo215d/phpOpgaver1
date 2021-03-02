<h1>Pythagoras a^2+b^2=c^2</h1>
<img src="triangle.png" alt="triangle!!!"><br>
<label>Indtast 2 værdier og tryk beregn for, at få længden af den manglende side</label>
<form method="post" action="">
<label for="">a</label>
<input type="text" name="a"><br>
<label for="">b</label>
<input type="text" name="b"><br>
<label for="">c</label>
<input type="text" name="c"><br>
<input type="submit" value="Beregn">
</form>
<label id="resultat">Resultat: </label><br>
<?php 
    //den her kæde af if sætninger chekker for de 3 kombinationer af 2 inputs og ellers echoer at man skal indtaste 2 felter
    if($_POST["a"] && $_POST["b"] && !$_POST["c"]) {
        echo "Du har indtastet a=".$_POST["a"]." og b=".$_POST["b"]."<br>";
        //check om det er tal, så vi kan lave matematik
        if (!is_numeric($_POST["a"]) || !is_numeric($_POST["b"])) {
            echo "Du må kun indtaste tal. Ikke bogstaver!<br>";
        } else {
            //pythagoras og echo resultatet. 
            $result = sqrt(pow($_POST["a"], 2)+pow($_POST["b"], 2));
            echo "siden c er $result lang<br>";
        }
    }
    else if($_POST["a"] && !$_POST["b"] && $_POST["c"]) {
        echo "Du har indtastet a=".$_POST["a"]." og c=".$_POST["c"]."<br>";
        if (!is_numeric($_POST["a"]) || !is_numeric($_POST["c"])) {
            echo "Du må kun indtaste tal. Ikke bogstaver!<br>";
        } else {
            $result = sqrt(pow($_POST["c"], 2)-pow($_POST["a"], 2));
            echo "siden b er $result lang<br>";
        }
    }
    else if(!$_POST["a"] && $_POST["b"] && $_POST["c"]) {
        echo "Du har indtastet b=".$_POST["b"]." og c=".$_POST["c"]."<br>";
        if (!is_numeric($_POST["b"]) || !is_numeric($_POST["c"])) {
            echo "Du må kun indtaste tal. Ikke bogstaver!<br>";
        } else {
            $result = sqrt(pow($_POST["c"], 2)-pow($_POST["b"], 2));
            echo "siden a er $result lang<br>";
        }
    }
    else {
        echo "Du skal indtaste 2 felter";
    }
?>