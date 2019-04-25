/*================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 5.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================

NOTE:
------
PLACE HERE YOUR OWN JS CODES AND IF NEEDED.
WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR CUSTOM SCRIPT IT'S BETTER LIKE THIS. */


function showToast(heading, text, type, position='top-right'){
	$.toast({
	    heading: heading,
	    text: text,
	    showHideTransition: 'plain',
	    icon: type,
	    position: position,
	})
}

function commonDataTables(selector,url,aoColumns,sDom,HiddenColumnID,RowCallBack,DrawCallBack,filters,sortBy){
    // console.log(HiddenColumnID);
    //Little Code For Sorting.
    if(typeof sortBy === "undefined"){
        sortBy = {
            'ColumnID' : 0,
            'SortType' : 'asc'
        }
    }
    oTable = selector.dataTable({
        "bServerSide": true,
        "bProcessing": true,
        "bPaginate" :true,
        "sPaginationType": "full_numbers",
        "bDestroy":true,
        "sServerMethod": "POST",
        "aaSorting":[[ sortBy['ColumnID'], sortBy['SortType'] ]],
        "sDom" : sDom,
        "aoColumns":aoColumns,
        "sAjaxSource": url,
        "iDisplayLength": 10,
        'fnServerData' : function(sSource, aoData, fnCallback){
            $.ajax({
                'dataType': 'json',
                'type': 'GET',
                'url': url,
                'data': aoData,
                'success': fnCallback
            }); //end of ajax
        },
        'fnRowCallback': function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            if(typeof HiddenColumnID !== "undefined"){
                $(nRow).attr("data-id",aData[HiddenColumnID]);
            }else{
                $(nRow).attr("data-id",aData[0]);
            }

            if(typeof RowCallBack !== "undefined" || RowCallBack === ''){
                eval(RowCallBack);
            }
            return nRow;
        },
        //This function is called on every 'draw' event, and allows you to dynamically modify any aspect you want about the created DOM.
        fnDrawCallback : function (oSettings) {
            if(typeof DrawCallBack !== "undefined" || DrawCallBack === ''){
                eval(DrawCallBack);
            }
        },
        "fnServerParams": function (aoData, fnCallBack) {
            if (typeof filters !== "undefined") {
                eval(filters);
            }
        }
    });
}
