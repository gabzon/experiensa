<?php
//$header_style = Header::get_header_layout();
//$page_id = get_the_ID();
//Header::get_header($header_style);
?>
<style media="screen">

.mobile.row{
    padding-top: 0px !important;
    margin-top: 0px !important;
}

.mobile.row .ui.inverted.menu{ border-radius: 0px !important; }

.padding-reset{ padding: 0px !important; }

@media (max-width: 767px) {
    .ui.grid.main{
        margin-top: 70px;
    }

    .ui.grid { margin: 0 !important; }
    .ui.vertical.menu.navbar{
        margin-top: 0px !important;
    }
}

.ui.vertical.menu{
    margin-top: -15px !important;
    width: 100%;
    display: none;
}
</style>
<script type="text/javascript">

jQuery(document).ready(function(){
    jQuery('.right.menu.open').on("click",function(e){
        e.preventDefault();
        jQuery('.ui.vertical.menu').toggle();
    });

    jQuery('.ui.dropdown').dropdown();
});
</script>
<div class="ui grid">
    <div class="computer tablet only row">
        <div class="ui secondary inverted fixed menu navbar grid">
            <a href="" class="brand item">Project Name</a>
            <a href="" class="active item">Home</a>
            <a href="" class="item">About</a>
            <a href="" class="item">Contact</a>
            <a class="ui dropdown item">Dropdown
                <i class="dropdown icon"></i>
                <div class="menu">
                    <div class="item">Action</div>
                    <div class="item">Another action</div>
                    <div class="item">Something else here</div>
                    <div class="ui divider"></div>
                    <div class="item">Seperated link</div>
                    <div class="item">One more seperated link</div>
                </div>
            </a>
            <div class="right menu">
                <a href="" class="item">Fixed top</a>
            </div>
        </div>
    </div>
    <div class="mobile only row">
        <div class="ui fixed secondary inverted navbar menu">
            <a href="" class="brand item">Project Name</a>
            <div class="right menu open">
                <a href="" class="menu item" style="font-weight:bold">
                    <i class="content icon"></i>
                </a>
            </div>
        </div>
        <div class="ui vertical inverted navbar menu">
            <a href="" class="active item">Home</a>
            <a href="" class="item">About</a>
            <a href="" class="item">Contact</a>
            <div class="ui item">
                <div class="text">Dropdown</div>
                <div class="menu">
                    <a class="item">Action</a>
                    <a class="item">Another action</a>
                    <a class="item">Something else here</a>
                    <a class="ui aider"></a>
                    <a class="item">Seperated link</a>
                    <a class="item">One more seperated link</a>
                </div>
            </div>
            <div class="menu">
                <a href="" class="active item">Default</a>
                <a href="" class="item">Static top</a>
                <a href="" class="item">Fixed top</a>
            </div>
        </div>
    </div>
</div>
