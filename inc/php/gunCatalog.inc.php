<?php

    function strBuilderHTML($stringHTML, $replace): string {
        $sizeOfReplace = count($replace);
        $index = 0;
        while(($pos = strpos($stringHTML, "REPL")) && ($index < $sizeOfReplace))
            $stringHTML = substr_replace($stringHTML, $replace[$index++], $pos, 4);
        return $stringHTML;
    }

    $gunJSON = file_get_contents("$metadata[Path]inc/js/gunCatalog.json");
    $gunHTMLJSON = file_get_contents("$metadata[Path]inc/js/gunHTML.json");
    $gunInfo = json_decode($gunJSON, true);
    $gunHTML = json_decode($gunHTMLJSON, true);

    foreach($gunInfo as $key => $value) {
        $modelHTML = strBuilderHTML($gunHTML["Model"], [$value["Series"], $value["Color"], $value["Model"]]);
        $msrpHTML = strBuilderHTML($gunHTML["Msrp"],  [$key, $value["MSRP"]]);

        echo  $gunHTML["Col"]
            . $gunHTML["Card"]
            . strBuilderHTML($gunHTML["Image"],  [$key, $value["Img"], $value["Name"]])
            . $gunHTML["Card-body"]
            . $gunHTML["Gun-name-color"]
            . strBuilderHTML($gunHTML["Gun-name"],  [$key, $value["Name"]])
            . $gunHTML["End-name-body"]
            . $gunHTML["Table"]
            . strBuilderHTML($gunHTML["Inner-table"], [$gunHTML["Table-headers"]["1"], $modelHTML])
            . strBuilderHTML($gunHTML["Inner-table"], [$gunHTML["Table-headers"]["2"], $value["Desc"]])
            . strBuilderHTML($gunHTML["Inner-table"], [$gunHTML["Table-headers"]["3"], $msrpHTML])
            . strBuilderHTML($gunHTML["Cart-btn"], [$key])
            . $gunHTML["End-table-card-col"];
    }
