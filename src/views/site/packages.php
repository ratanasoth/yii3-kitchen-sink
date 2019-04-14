<?php

use idk\app\helpers\DocHelper;
use idk\app\helpers\Html;
use yii\helpers\Yii;
use idk\app\assets\DependencyGraphAsset;

/** @var array $packages */
/** @var string $title */
/** @var string $subTitle */
/** @var bool $hasDependencies */

$this->title = $title;
$this->subTitle = $subTitle;

DependencyGraphAsset::register($this);

?>

<?= DocHelper::doc('3-Packages') ?>

    <hr/>

    <p>
        The current on-going effort is to make the grid below all green:
    </p>

    <div class="row">
        <?php foreach ($packages as $package => $infos): ?>

                <div class="col-6 col-sm-4 col-md-2 mb-4 text-center">
                    <div><?= $package ?></div>
                    <?= Html::a(Html::o('mark-github'), 'https://github.com/yiisoft/' . $package) ?>
                    <p>
                        <a href="https://travis-ci.<?= $infos['travis'] ?>/yiisoft/<?= $package ?>">
                            <img src="https://travis-ci.<?= $infos['travis'] ?>/yiisoft/<?= $package ?>.svg?branch=master"/>
                        </a>
                    </p>

                </div>

        <?php endforeach ?>
    </div>

    <hr/>


<?php if ($hasDependencies): ?>
    <p id="dependencies">
        Below is a dependency graph between Yii 3 packages generated by scanning the <code>require</code> section
        of each package <em>composer.json</em> file.
    </p>

    <div id="graph"></div>
    <small><a href="http://bl.ocks.org/jkschneider/c7660044fe74ab9ee53e">credits</a></small>

<?php else: ?>
    <p id="dependencies">
        A dependency graph can be generated using d3 js and displayed in this page.
    </p>
    <pre><code>
# clone all yii3 repositories (as defined in `config/params.php`)
./yii github/clone

# generate the dependencies json file
/yii packages/d3
</code></pre>
<?php endif ?>