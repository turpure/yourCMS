<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>开发毛利报表</title>
    <link rel="stylesheet" href="/Public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/assets/bootstrap-table/src/bootstrap-table.css">
    <link rel="stylesheet" href="//rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css">
    <!--<link rel="stylesheet" href="/Public/assets/examples.css">-->
    <style>
        .fixed-table-body{overflow:hidden}
        .fixed-table-container{float: left; position:relative;  overflow:auto}
        /*.myclass{overflow-x:auto;}*/
    </style>

    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap-table/1.9.1/bootstrap-table.min.js"></script>

</head>
<body>
<div class="header navbar " style="margin-bottom: -18px; width:400px">

    <div class="header-inner">
        <a class="navbar-brand"  href="#" onClick="javascript :history.back(-1);">返回条件选择页
        </a>
        <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <!--<a  class="navbar-brand" href="<?php echo U('Demo/Index/export');?>" >导出数据-->
        <a  class="navbar-brand" href="<?php echo U('Demo/Index/export_dev');?>" >导出数据
        </a>
    </div>

</div>
<div style="position:absolute; ">
    <div style="position: relative;" >
    <div  class="container-fluid">
            <table id="table" >

            </table>
    </div>
    </div>
    <div style="position: relative;" >
        <div  class="container-fluid">

            <table id="table2" >
            </table>
        </div>
    </div>
</div>
<script>


    function initTable(tableName,num) {

        tableName.bootstrapTable({

            footerStyle:footerStyle,
            showFooter:true,
            showColumns:true,
            search:true,
            url:"/Demo/Index/salername" + num,
            columns: [
                [

                    {
                        title: '业绩归属人' + num,
                        sortable: true,
                        field: 'salernamezero',
                        rowspan: 1,
                        align: 'center',
                        valign: 'middle',
                        sortable: true,
                        visible:true,
                        footerFormatter:'<strong style="color: red">汇总</strong>',

                    },
                    {
                        field: 'timegroupzero',
                        sortable: true,
                        title: '时间段(0-6月)',
                        visible:false,
                        align: 'center'
                    },{
                    field: 'salemoneyrmbuszero',
                    title: '销售额$(0-6月)',
                    visible:false,
                    sortable: true,
                    footerFormatter:totalPriceFormatter,

                    align: 'center'
                }, {
                    field: 'salemoneyrmbznzero',
                    title: '销售额￥(0-6月)',
                    sortable: true,
                    visible:true,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                }, {

                    field: 'costmoneyrmbzero',
                    title: '商品成本￥(0-6月)',
                    sortable: true,
                    visible:false,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                },{
                    field: 'ppebayuszero',
                    title: '交易费汇总$(0-6月)',
                    sortable: true,
                    visible:false,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,


                },{
                    field: 'ppebayznzero',
                    title: '交易费汇总￥(0-6月)',
                    sortable: true,
                    visible:false,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,


                },{
                    field: 'inpackagefeermbzero',
                    title: '包装成本￥(0-6月)',
                    sortable: true,
                    visible:false,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,


                },{
                    field: 'expressfarermbzero',
                    title: '运费成本￥(0-6月)',
                    sortable: true,
                    visible:false,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,
                },{
                    field: 'devofflinefeezero',
                    title: '死库处理￥(0-6月)',
                    sortable: true,
                    visible:false,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                },
                    {
                        field: 'devopefeezero',
                        title: '运营杂费￥(0-6月)',
                        sortable: true,
                        visible:false,
                        align: 'center',
                        footerFormatter:totalPriceFormatter,

                    },
                    {
                        field: 'netprofitzero',
                        title: '毛利润￥(0-6月)',
                        sortable: true,
                        visible:true,
                        align: 'center',
                        footerFormatter:totalPriceFormatter,

                    }
                    ,{

                    field: 'netratezero',
                    title: '毛利率%(0-6月)',
                    sortable: true,
                    visible:true,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                },{

                    field: 'timegroupsix',
                    title: '时间段(6-12月)',
                    visible:false,
                    align: 'center',


                },{
                    field: 'salemoneyrmbussix',
                    title: '销售额$(6-12月)',
                    sortable: true,
                    visible:false,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,
                }, {
                    field: 'salemoneyrmbznsix',
                    title: '销售额￥(6-12月)',
                    sortable: true,
                    visible:true,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,
                }, {
                    field: 'costmoneyrmbsix',
                    title: '商品成本￥(6-12月)',
                    sortable: true,
                    visible:false,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                },{

                    field: 'ppebayussix',
                    title: '交易费汇总$(6-12月)',
                    sortable: true,
                    visible:false,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                },{
                    field: 'ppebayznsix',
                    title: '交易费汇总￥(6-12月)',
                    visible:false,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                },{
                    field: 'inpackagefeermbsix',
                    title: '包装成本￥(6-12月)',
                    sortable: true,
                    visible:false,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                },{
                    field: 'expressfarermbsix',
                    title: '运费成本￥(6-12月)',
                    sortable: true,
                    visible:false,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                },{
                    field: 'devofflinefeesix',
                    title: '死库处理￥(6-12月)',
                    sortable: true,
                    visible:false,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                },
                    {
                        field: 'devopefeesix',
                        title: '运营杂费￥(6-12月)',
                        sortable: true,
                        visible:false,
                        align: 'center',
                        footerFormatter:totalPriceFormatter,

                    },
                    {
                        field: 'netprofitsix',
                        title: '毛利润￥(6-12月)',
                        sortable: true,
                        visible:true,
                        align: 'center',
                        footerFormatter:totalPriceFormatter,

                    }

                    ,{
                    field: 'netratesix',
                    title: '毛利率%(6-12月)',
                    sortable: true,
                    visible:true,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                },
                    {

                        field: 'timegrouptwe',
                        title: '时间段(12月以上)',
                        visible:false,
                        editable: true,
                        align: 'center',

                    },{
                    field: 'salemoneyrmbustwe',
                    title: '销售额$(12月以上)',
                    sortable: true,
                    visible:false,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,
                }, {
                    field: 'salemoneyrmbzntwe',
                    title: '销售额￥(12月以上)',
                    sortable: true,
                    visible:true,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                }, {
                    field: 'costmoneyrmbtwe',
                    title: '商品成本￥(12月以上)',
                    sortable: true,
                    visible:false,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                },{

                    field: 'ppebayustwe',
                    title: '交易费汇总$(12月以上)',
                    sortable: true,
                    visible:false,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                },{
                    field: 'ppebayzntwe',
                    title: '交易费汇总￥(12月以上)',
                    sortable: true,
                    visible:false,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                },{
                    field: 'inpackagefeermbtwe',
                    title: '包装成本￥(12月以上)',
                    sortable: true,
                    visible:false,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                },{
                    field: 'expressfarermbtwe',
                    title: '运费成本￥(12月以上)',
                    sortable: true,
                    visible:false,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                },{
                    field: 'devofflinefeetwe',
                    title: '死库处理￥(12月以上)',
                    sortable: true,
                    visible:false,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                },
                    {
                        field: 'devopefeetwe',
                        title: '运营杂费￥(12月以上)',
                        sortable: true,
                        visible:false,

                        align: 'center',
                        footerFormatter:totalPriceFormatter,

                    },{
                    field: 'netprofittwe',
                    title: '毛利润￥(12月以上)',
                    sortable: true,
                    visible:true,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                },{
                    field: 'netratetwe',
                    title: '毛利率%(12月以上)',
                    sortable: true,
                    visible:true,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                }
                    , {
                    field: 'salemoneyrmbtotal',
                    title: '销售额￥(汇总)',
                    sortable: true,
                    visible:true,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                }
                    , {
                    field: 'netprofittotal',
                    title: '毛利润￥(汇总)',
                    sortable: true,
                    visible:true,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                }
                    , {
                    field: 'netratetotal',
                    title: '毛利率%(汇总)',
                    sortable: true,
                    visible:true,
                    align: 'center',
                    footerFormatter:totalPriceFormatter,

                }

                ]
            ]
        });
    }


</script>
<script>
    $(function () {
        var $table = $('#table'),
            $table2 = $('#table2'),
            $total =$('#total');
        initTable($table,'');
        initTable($table2,'2');

    })


    function totalPriceFormatter(data) {
        var total = 0;
        field = this.field;
        if(this.field !=='netratezero'&&this.field !=='netratesix'&&this.field !=='netratetwe'&&this.field !=='netratetotal'){
            return '<strong style="color: red" >'+ parseFloat(data.reduce(function(sum, row) {
                    return  sum + (+row[field]);
                }, 0)).toFixed(2)+'<strong>';
        }
        else if(this.field =='netratezero'){

            var colgrossprofit = data.reduce(function(sum, row) {
                return  sum + (+row.netprofitzero);

            }, 0);
            var colsalemoneyzn = data.reduce(function(sum, row) {
                return  sum + (+row.salemoneyrmbznzero);

            }, 0);
            return  '<strong style="color: red">'+parseFloat(100*colgrossprofit/colsalemoneyzn).toFixed(2)+'<strong>';
        }
        else if(this.field =='netratesix'){


            var colgrossprofit = data.reduce(function(sum, row) {
                return  sum + (+row.netprofitsix);

            }, 0);
            var colsalemoneyzn = data.reduce(function(sum, row) {
                return  sum + (+row.salemoneyrmbznsix);

            }, 0);
            return  '<strong style="color: red">'+parseFloat(100*colgrossprofit/colsalemoneyzn).toFixed(2)+'<strong>';
        }
        else if(this.field =='netratetwe'){

            var colgrossprofit = data.reduce(function(sum, row) {
                return  sum + (+row.netprofittwe);

            }, 0);
            var colsalemoneyzn = data.reduce(function(sum, row) {
                return  sum + (+row.salemoneyrmbzntwe);

            }, 0);
            return  '<strong style="color: red">'+parseFloat(100*colgrossprofit/colsalemoneyzn).toFixed(2)+'<strong>';
        }
        else if(this.field =='netratetotal'){
//            salemoneyrmbtotal netprofittotal
            var colgrossprofit = data.reduce(function(sum, row) {
                return  sum + (+row.netprofittotal);

            }, 0);
            var colsalemoneyzn = data.reduce(function(sum, row) {
                return  sum + (+row.salemoneyrmbtotal);

            }, 0);
            return  '<strong style="color: red">'+parseFloat(100*colgrossprofit/colsalemoneyzn).toFixed(2)+'<strong>';
        }
    }




    function footerStyle(value, row, index) {
        return {
            css: { "font-weight": "blod" ,
                "font-color":"red"


            }
        };
    }


</script>
</body>
</html>