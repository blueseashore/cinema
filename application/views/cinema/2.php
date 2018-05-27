<style>
    /*横条样式*/
    input[type=range] {
        -webkit-appearance: none;/*清除系统默认样式*/
        width: 100%;
        background: -webkit-linear-gradient(#61bd12, #61bd12) no-repeat, #ddd;/*设置左边颜色为#61bd12，右边颜色为#ddd*/
        background-size: 75% 100%;/*设置左右宽度比例*/
        height: 3px;/*横条的高度*/
    }
    /*拖动块的样式*/
    input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none;/*清除系统默认样式*/
        height: 26px;/*拖动块高度*/
        width: 26px;/*拖动块宽度*/
        background: #fff;/*拖动块背景*/
        border-radius: 50%; /*外观设置为圆形*/
        border: solid 1px #ddd; /*设置边框*/
    }
    ::-ms-tooltip { display: none; /* 数值提示 只能是display或visibility */ }
</style>
<input type="range" value="0">
