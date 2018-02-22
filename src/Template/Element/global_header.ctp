<?php
use App\Statics\UserInfo;
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a class="navbar-brand" href="<?= $this->Url->build(['controller' => 'Decks', 'action' => 'index', UserInfo::$user['id']]); ?>">MTG Deck-Builder</a>
        </div>
        <!--  SP画面時、Sideberに取り込まれる要素      -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <p>ようこそ！ <?= UserInfo::$user['name'] ?></p>
                </li>
            </ul>
        </div>
    </div>
</nav>