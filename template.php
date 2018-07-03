<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);
CJSCore::Init(array("jquery"));
$this->addExternalJs(SITE_TEMPLATE_PATH . "/assets/js/main.js");
?>

<?  $num = 0;
    foreach ($arResult["ITEMS"] as $arItem) {
        $type = $arItem['DISPLAY_PROPERTIES']['VIEWCAR']['VALUE_XML_ID'];
        $power = $arItem['DISPLAY_PROPERTIES']['POWER']['VALUE'];
        $newArray[$type]['TITLE'][] = $arItem['DISPLAY_PROPERTIES']['VIEWCAR']['VALUE'];

        if ($power > 150) {
            $newArray[$type]['big'][$num]['marka'] = $arItem['DISPLAY_PROPERTIES']['MARKA']['VALUE']['TEXT'];
            $newArray[$type]['big'][$num]['desc'] = $arItem['DISPLAY_PROPERTIES']['DESCRIPTION']['VALUE']['TEXT'];
            $newArray[$type]['big'][$num]['price'] = $arItem['DISPLAY_PROPERTIES']['PRICE']['VALUE'];
        } else {
            $newArray[$type]['sm'][$num]['marka'] = $arItem['DISPLAY_PROPERTIES']['MARKA']['VALUE']['TEXT'];
            $newArray[$type]['sm'][$num]['desc'] = $arItem['DISPLAY_PROPERTIES']['DESCRIPTION']['VALUE']['TEXT'];
            $newArray[$type]['sm'][$num]['price'] = $arItem['DISPLAY_PROPERTIES']['PRICE']['VALUE'];
        }
        $num++;
    }

?>

<div id='cssmenu'>
    <ul>
        <li><a href='#'><span>Машины</span></a></li>

        <?php foreach ( $newArray as $key => $item): ?>

            <li>
                <a href='#'><span><?= $item['TITLE'][0]; ?></span></a>
                <ul>

                <?php if (!empty($item['big'] )): ?>

                    <li><a href='#' data-menu-id="1">Более 150 л.с</a></li>
                        <table data-menu-view="1">
                            <thead>
                                <tr>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Цена</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php foreach ($item['big'] as $values):?>
                                    <tr>
                                        <td><?= $values['marka'] ?></td>
                                        <td><?= $values['desc'] ?></td>
                                        <td><?= $values['price'] ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>

                <?php endif; ?>

                <?php if (!empty($item['sm'] )): ?>

                    <li><a href='#' data-menu-id="2">Менее 150 л.с</a></li>
                    <table data-menu-view="2">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Цена</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($item['sm'] as $values):?>
                            <tr>
                                <td><?= $values['marka'] ?></td>
                                <td><?= $values['desc'] ?></td>
                                <td><?= $values['price'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                <?php endif; ?>

                </ul>
            </li>

        <?php endforeach; ?>

    </ul>
</div>