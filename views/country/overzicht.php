<table>
    <thead>
        <tr>
            <th>Naam</th>
            <th>Hoofdstad</th>
            <th>Oppervlakte</th>
            <th> Taal </th>
        </tr>
    </thead>
    <body>
        <?php foreach ($countries as $country): ?>
            <tr>
                <td><?php echo $country->Name; ?></td>
                <td><?php echo \yii\helpers\Html::a($country->hoofdstad->Name, ['city/view', 'ID' => $country->hoofdstad->ID]); ?></td>
                <?php 
                //Rick Lodewijk
                    echo "<td align='right'>". number_format($country->SurfaceArea, 0, ',', ' '). "</td>";
                    echo "<td>";
                    // echo $country-> Language;

                    // foreach ($country->languages as $language) {
                    //     echo "- {$language->Language} - {$language->Percentage}%\n";
                    // }

                    foreach ($country-> talen as $taal){
                        echo $taal-> Language;
                        echo " (".$taal->Percentage. "%)";
                        echo "<br>";
                    }
                    echo "<br>";
                  //  _d($country->xxx);
                    // echo \yii\helpers\Html::a($country->Countrylanguages, ['city/country-language', 'ID' => $country->language->ID]);
                    echo "</td>";   
                ?>
            </tr>
        <?php endforeach; ?>
    </body>
</table>
