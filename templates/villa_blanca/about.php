<!--ABOUT SECTION-->
<section id="section_page_about" class="ui vertical segment custom-section" style="">
    <div class="ui container vertical segment section-content" style="padding: 0px 15px 0 15px;color:#FFFFFF;">
        <br>
        <div class="ui center aligned header" style="color:#FFFFFF;">
            <br>
            <br>
            <div class="page-header">
                <h1><?=$about_title;?></h1>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="ui stackable grid">
            <div class="two wide column"></div>
            <div class="twelve wide column" style="text-align: center;">
                <h3><?=$about_subtitle;?></h3>
            </div>
            <div class="two wide column"></div>
        </div>
        <div class="ui two column grid stackable" style="text-align: justify;">
            <div class="column"><?=$first_content;?></div>
            <div class="column">
                <?= $second_content;?>
                <br>
                <br>
            </div>
        </div>
    </div>
    <br>
    <br>
</section>