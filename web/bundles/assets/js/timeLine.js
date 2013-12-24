/**
 * Created by Morteza on 11/3/13.
 */
var month_type = true;
var rows = 1;
var empty_rooms = [];
var deleted_rooms = [];
var edited_rooms = [];
var roomIds = [];
var editedRoomsString = "{";
var deletedRoomsString = "{";
var startDblEmpty = false;
var weekDays = ["ش","ی","د","س","چ","پ","ج"];
function timeline_header(monthType,startWeek){
    month_type = monthType;
    var dayWeek = startWeek;
    wFri = "";
    $(".timeLine").append('<div class="tl-title"></div>');
    $(".tl-title").append('<div class="tl-data-t tl-data-title">عنوان و نوع اتاق</div>');
    for(var i=1;i<=9;i++){
        if(dayWeek ==6) wFri = " wFriday";
        else wFri = "";
        $(".tl-title").append('<div class="tl-data-t">0'+i+'<br /><span class="week'+wFri+'">'+weekDays[dayWeek]+'</span></div>');
        dayWeek++;
        if(dayWeek >=7) dayWeek=0;
    }
    if(month_type){
        for(var i=10;i<=31;i++){
            if(dayWeek ==6) wFri = " wFriday";
            else wFri = "";
            $(".tl-title").append('<div class="tl-data-t">'+i+'<br /><span class="week'+wFri+'">'+weekDays[dayWeek]+'</span></div>');
            dayWeek++;
            if(dayWeek >=7) dayWeek=0;
        }
    }else{
        $(".timeLine").css("margin-left","30px");
        for(var i=10;i<=30;i++){
            if(dayWeek ==6) wFri = " wFriday";
            else wFri = "";
            $(".tl-title").append('<div class="tl-data-t">'+i+'<br /><span class="week'+wFri+'">'+weekDays[dayWeek]+'</span></div>');
            dayWeek++;
            if(dayWeek >=7) dayWeek=0;
        }
    }

}
function timeline_add_row_notEdit(roomId,roomType,roomName,tl_events){

    edited_rooms[roomId] = [];
    deleted_rooms[roomId] = [];
    roomIds.push(roomId);
    $(".timeLine").append('<div class="tl-row tl-row-'+roomId+'"></div>');
    $('.tl-row-'+roomId).append('<div class="tl-data tl-data-title"> اتاق '+roomName+' '+roomType+'</div>');
    if(month_type){
        for(var i=1;i<=31;i++){
            $('.tl-row-'+roomId).append('<div class="tl-data" id="tl-'+roomId+'-'+i+'"></div>');
            $('#tl-'+roomId+'-'+i).append('<div class="tl-click"></div>');
            $('#tl-'+roomId+'-'+i).attr("onmouseover",'show_cost("","'+roomId+'-'+i+'");');
        }
    }else{
        for(var i=1;i<=30;i++){
            $('.tl-row-'+roomId).append('<div class="tl-data" id="tl-'+roomId+'-'+i+'"></div>');
            $('#tl-'+roomId+'-'+i).append('<div class="tl-click"></div>');
            $('#tl-'+roomId+'-'+i).attr("onmouseover",'show_cost("","'+roomId+'-'+i+'");');
        }
    }

    var types = new Array();
    types[0]="#74b749";
    types[2]="rgb(255,0,0)";
    types[1]="#ffaa00";
    count_events = tl_events.length;
    var empty_this_room = [];

    for(ev=0;ev<count_events;ev++){
        datas = tl_events[ev][1].split("-");
        count = datas.length;
        type = tl_events[ev][0];
        if(type == 1){
            width_balloon = 1;
            if(count > 1){
                $('#tl-'+roomId+'-'+datas[0]).append('<div class="tl-event-first tl-type-1" id="tle-'+roomId+'-'+datas[0]+'" style="top:-18px;background-color: '+types[1]+';"></div>');
                $('#tl-'+roomId+'-'+datas[0]).removeAttr("onmouseover");
                for(j=1;j<count;j++){
                    $('#tl-'+roomId+'-'+datas[j]).append('<div class="tl-event tl-type-1"  id="tle-'+roomId+'-'+datas[j]+'" style="top:-18px;background-color: '+types[1]+';"></div>');
                    $('#tl-'+roomId+'-'+datas[j]).removeAttr("onmouseover");
                    width_balloon+=1;
                }
                $('#tl-'+roomId+'-'+datas[0]).append('<div class="tl-over" id="tl-balloon-'+roomId+'-'+datas[0]+'" style="top:-36px;width: '+(26*width_balloon)+'px" onmouseover="show_detail_full(\''+tl_events[ev][2]+'\','+roomId+','+datas[0]+','+width_balloon+');"></div>');

            }else if(count == 1){
                $('#tl-'+roomId+'-'+datas[0]).append('<div class="tl-event-first tl-type-1" id="tle-'+roomId+'-'+datas[0]+'" style="top:-18px;background-color: '+types[1]+';"></div>');
                $('#tl-'+roomId+'-'+datas[0]).append('<div class="tl-over" id="tl-balloon-'+roomId+'-'+datas[0]+'" style="top:-36px;width: 25px" onmouseover="show_detail_full(\''+tl_events[ev][2]+'\','+roomId+','+datas[0]+','+width_balloon+');"></div>');
                $('#tl-'+roomId+'-'+datas[0]).removeAttr("onmouseover");
            }
        }else if(type == 2){
            width_balloon2 = 1;
            if(count > 1){
                $('#tl-'+roomId+'-'+datas[0]).append('<div class="tl-event-first tl-type-1" id="tle-'+roomId+'-'+datas[0]+'" style="top:-18px;background-color: '+types[2]+';"></div>');
                $('#tl-'+roomId+'-'+datas[0]).removeAttr("onmouseover");
                for(j=1;j<count;j++){
                    $('#tl-'+roomId+'-'+datas[j]).append('<div class="tl-event tl-type-1"  id="tle-'+roomId+'-'+datas[j]+'" style="top:-18px;background-color: '+types[2]+';"></div>');
                    $('#tl-'+roomId+'-'+datas[j]).removeAttr("onmouseover");
                    width_balloon2+=1;
                }
                $('#tl-'+roomId+'-'+datas[0]).append('<div class="tl-over" id="tl-balloon-'+roomId+'-'+datas[0]+'" style="top:-36px;width: '+(26*width_balloon2)+'px" onmouseover="show_detail_full(\''+tl_events[ev][2]+'\','+roomId+','+datas[0]+','+width_balloon2+');"></div>');

            }else if(count == 1){
                $('#tl-'+roomId+'-'+datas[0]).append('<div class="tl-event-first tl-type-1" id="tle-'+roomId+'-'+datas[0]+'" style="top:-18px;background-color: '+types[2]+';"></div>');
                $('#tl-'+roomId+'-'+datas[0]).append('<div class="tl-over" id="tl-balloon-'+roomId+'-'+datas[0]+'" style="top:-36px;width: 25px" onmouseover="show_detail_full(\''+tl_events[ev][2]+'\','+roomId+','+datas[0]+','+width_balloon2+');"></div>');
                $('#tl-'+roomId+'-'+datas[0]).removeAttr("onmouseover");
            }
        }else if(type == 0){
            if(count > 1){
                $('#tl-'+roomId+'-'+datas[0]).append('<div class="tl-event-first tl-type-0" id="tle-'+roomId+'-'+datas[0]+'" style="top:-18px;background-color: '+types[0]+';"></div>');
                $('#tl-'+roomId+'-'+datas[0]).attr("onmouseover",'show_cost(\'قیمت: <br />'+tl_events[ev][2]+' ریال\',"'+roomId+'-'+datas[0]+'");');
                empty_this_room.push(datas[0]);

                for(j=1;j<count;j++){
                    $('#tl-'+roomId+'-'+datas[j]).append('<div class="tl-event tl-type-0" id="tle-'+roomId+'-'+datas[j]+'" style="top:-18px;background-color: '+types[0]+';"></div>');
                    $('#tl-'+roomId+'-'+datas[j]).attr("onmouseover",'show_cost(\'قیمت: <br />'+tl_events[ev][2]+' ریال\',"'+roomId+'-'+datas[j]+'");');
                    empty_this_room.push(datas[j]);
                }
            }else if(count == 1){
                $('#tl-'+roomId+'-'+datas[0]).append('<div class="tl-event-first tl-type-0" id="tle-'+roomId+'-'+datas[0]+'" style="top:-18px;background-color: '+types[0]+';"></div>');
                $('#tl-'+roomId+'-'+datas[0]).attr("onmouseover",'show_cost(\'قیمت: <br />'+tl_events[ev][2]+' ریال\',"'+roomId+'-'+datas[0]+'");');
                empty_this_room.push(datas[0]);
            }

        }

    }

    empty_this_room.sort(function(a,b){return a-b});
    empty_rooms[roomId]=empty_this_room;
}
function timeline_add_row(roomId,roomType,roomName,tl_events){
    edited_rooms[roomId] = [];
    deleted_rooms[roomId] = [];
    roomIds.push(roomId);
    $(".timeLine").append('<div class="tl-row tl-row-'+roomId+'"></div>');
    $('.tl-row-'+roomId).append('<div class="tl-data tl-data-title"> اتاق '+roomName+' '+roomType+'</div>');
    if(month_type){
        for(var i=1;i<=31;i++){
            $('.tl-row-'+roomId).append('<div class="tl-data" id="tl-'+roomId+'-'+i+'"></div>');
            $('#tl-'+roomId+'-'+i).append('<div class="tl-click" onclick="tl_emptyOrNot('+roomId+','+i+');" ondblclick="setDblStartOrStopEmpty('+roomId+','+i+')"></div>');
            $('#tl-'+roomId+'-'+i).attr("onmouseover",'show_cost("","'+roomId+'-'+i+'");');
        }
    }else{
        for(var i=1;i<=30;i++){
            $('.tl-row-'+roomId).append('<div class="tl-data" id="tl-'+roomId+'-'+i+'"></div>');
            $('#tl-'+roomId+'-'+i).append('<div class="tl-click" onclick="tl_emptyOrNot('+roomId+','+i+');" ondblclick="setDblStartOrStopEmpty('+roomId+','+i+')"></div>');
            $('#tl-'+roomId+'-'+i).attr("onmouseover",'show_cost("","'+roomId+'-'+i+'");');
        }
    }

    var types = new Array();
    types[0]="#74b749";
    types[2]="rgb(255,0,0)";
    types[1]="#ffaa00";
    count_events = tl_events.length;
    var empty_this_room = [];

    for(ev=0;ev<count_events;ev++){
        datas = tl_events[ev][1].split("-");
        count = datas.length;
        type = tl_events[ev][0];
        if(type == 1){
            width_balloon = 1;
            if(count > 1){
                $('#tl-'+roomId+'-'+datas[0]).append('<div class="tl-event-first tl-type-1" id="tle-'+roomId+'-'+datas[0]+'" style="top:-18px;background-color: '+types[1]+';"></div>');
                $('#tl-'+roomId+'-'+datas[0]).removeAttr("onmouseover");
                for(j=1;j<count;j++){
                    $('#tl-'+roomId+'-'+datas[j]).append('<div class="tl-event tl-type-1"  id="tle-'+roomId+'-'+datas[j]+'" style="top:-18px;background-color: '+types[1]+';"></div>');
                    $('#tl-'+roomId+'-'+datas[j]).removeAttr("onmouseover");
                    width_balloon+=1;
                }
                $('#tl-'+roomId+'-'+datas[0]).append('<div class="tl-over" id="tl-balloon-'+roomId+'-'+datas[0]+'" style="top:-36px;width: '+(26*width_balloon)+'px" onmouseover="show_detail_full(\''+tl_events[ev][2]+'\','+roomId+','+datas[0]+','+width_balloon+');"></div>');

            }else if(count == 1){
                $('#tl-'+roomId+'-'+datas[0]).append('<div class="tl-event-first tl-type-1" id="tle-'+roomId+'-'+datas[0]+'" style="top:-18px;background-color: '+types[1]+';"></div>');
                $('#tl-'+roomId+'-'+datas[0]).append('<div class="tl-over" id="tl-balloon-'+roomId+'-'+datas[0]+'" style="top:-36px;width: 25px" onmouseover="show_detail_full(\''+tl_events[ev][2]+'\','+roomId+','+datas[0]+','+width_balloon+');"></div>');
                $('#tl-'+roomId+'-'+datas[0]).removeAttr("onmouseover");
            }
        }else if(type == 2){
            width_balloon2 = 1;
            if(count > 1){
                $('#tl-'+roomId+'-'+datas[0]).append('<div class="tl-event-first tl-type-1" id="tle-'+roomId+'-'+datas[0]+'" style="top:-18px;background-color: '+types[2]+';"></div>');
                $('#tl-'+roomId+'-'+datas[0]).removeAttr("onmouseover");
                for(j=1;j<count;j++){
                    $('#tl-'+roomId+'-'+datas[j]).append('<div class="tl-event tl-type-1"  id="tle-'+roomId+'-'+datas[j]+'" style="top:-18px;background-color: '+types[2]+';"></div>');
                    $('#tl-'+roomId+'-'+datas[j]).removeAttr("onmouseover");
                    width_balloon2+=1;
                }
                $('#tl-'+roomId+'-'+datas[0]).append('<div class="tl-over" id="tl-balloon-'+roomId+'-'+datas[0]+'" style="top:-36px;width: '+(26*width_balloon2)+'px" onmouseover="show_detail_full(\''+tl_events[ev][2]+'\','+roomId+','+datas[0]+','+width_balloon2+');"></div>');

            }else if(count == 1){
                $('#tl-'+roomId+'-'+datas[0]).append('<div class="tl-event-first tl-type-1" id="tle-'+roomId+'-'+datas[0]+'" style="top:-18px;background-color: '+types[2]+';"></div>');
                $('#tl-'+roomId+'-'+datas[0]).append('<div class="tl-over" id="tl-balloon-'+roomId+'-'+datas[0]+'" style="top:-36px;width: 25px" onmouseover="show_detail_full(\''+tl_events[ev][2]+'\','+roomId+','+datas[0]+','+width_balloon2+');"></div>');
                $('#tl-'+roomId+'-'+datas[0]).removeAttr("onmouseover");
            }
        }else if(type == 0){
            if(count > 1){
                $('#tl-'+roomId+'-'+datas[0]).append('<div class="tl-event-first tl-type-0" id="tle-'+roomId+'-'+datas[0]+'" style="top:-18px;background-color: '+types[0]+';"></div>');
                $('#tl-'+roomId+'-'+datas[0]).attr("onmouseover",'show_cost(\'قیمت: <br />'+tl_events[ev][2]+' ریال\',"'+roomId+'-'+datas[0]+'");');
                empty_this_room.push(datas[0]);

                for(j=1;j<count;j++){
                    $('#tl-'+roomId+'-'+datas[j]).append('<div class="tl-event tl-type-0" id="tle-'+roomId+'-'+datas[j]+'" style="top:-18px;background-color: '+types[0]+';"></div>');
                    $('#tl-'+roomId+'-'+datas[j]).attr("onmouseover",'show_cost(\'قیمت: <br />'+tl_events[ev][2]+' ریال\',"'+roomId+'-'+datas[j]+'");');
                    empty_this_room.push(datas[j]);
                }
            }else if(count == 1){
                $('#tl-'+roomId+'-'+datas[0]).append('<div class="tl-event-first tl-type-0" id="tle-'+roomId+'-'+datas[0]+'" style="top:-18px;background-color: '+types[0]+';"></div>');
                $('#tl-'+roomId+'-'+datas[0]).attr("onmouseover",'show_cost(\'قیمت: <br />'+tl_events[ev][2]+' ریال\',"'+roomId+'-'+datas[0]+'");');
                empty_this_room.push(datas[0]);
            }

        }

    }

    empty_this_room.sort(function(a,b){return a-b});
    empty_rooms[roomId]=empty_this_room;

}
function show_balloon(position,message){
    $('#tl-balloon-'+position).balloon({
        position: "bottom",
        contents: '<span style="text-align: right;direction: rtl;">'+message+'</span>'
    });
}
function setDblStartOrStopEmpty(roomId,day){
    var new_cost = parseInt($("#tl_cost_for_day").val());
    if (startDblEmpty === false && $('#tle-'+roomId+'-'+day).attr("style") == undefined){
        startDblEmpty = [roomId,day];
        $('#tl-'+roomId+'-'+day).append('<div id="tl-startDbl" onDblclick="startDblEmpty = false;$(\'#tl-startDbl\').remove();tl_emptyOrNot('+roomId+','+day+');"></div>');
//        $('#tl-'+roomId+'-'+day).css("backgroundColor",'#aaaaff');

    }else if(startDblEmpty !== false && $('#tle-'+roomId+'-'+day).attr("style") == undefined){
        var tempStart = startDblEmpty;
        var isNotNull = "";
        startDblEmpty = false;
        $("#tl-startDbl").remove();
        if(day == tempStart[1]){
            if(!$('#tle-'+tempStart[0]+'-'+day).hasClass("tl-type-0") && !$('#tle-'+tempStart[0]+'-'+day).hasClass("tl-type-1")){
                $('#tl-'+tempStart[0]+'-'+day).append('<div class="tl-event-first tl-type-0" id="tle-'+tempStart[0]+'-'+day+'" style="top:-18px;background-color: #74b749;"></div>');
                edited_rooms[tempStart[0]].push(day);
                edited_rooms[tempStart[0]].push('cost-'+new_cost);
                $('#tl-'+tempStart[0]+'-'+day).attr("onmouseover",'show_cost("'+new_cost+'","'+tempStart[0]+'-'+day+'");');
                show_cost(new_cost,day);
            }
        }else if(day > tempStart[1]){
            $('#tl-'+tempStart[0]+'-'+tempStart[1]).append('<div class="tl-event-first tl-type-0" id="tle-'+tempStart[0]+'-'+tempStart[1]+'" style="top:-18px;background-color: #74b749;"></div>');
            edited_rooms[tempStart[0]].push(tempStart[1]);
            edited_rooms[tempStart[0]].push('cost-'+new_cost);
            $('#tl-'+tempStart[0]+'-'+tempStart[1]).attr("onmouseover",'show_cost("'+new_cost+'","'+tempStart[0]+'-'+tempStart[1]+'");');
            for(var i=tempStart[1]+1;i<=day;i++){
                if(!$('#tle-'+tempStart[0]+'-'+i).hasClass("tl-type-0") && !$('#tle-'+tempStart[0]+'-'+i).hasClass("tl-type-1")){
                    $('#tl-'+tempStart[0]+'-'+i).append('<div class="tl-event'+isNotNull+' tl-type-0" id="tle-'+tempStart[0]+'-'+i+'" style="top:-18px;background-color: #74b749;"></div>');
                    edited_rooms[tempStart[0]].push(i);
                    edited_rooms[tempStart[0]].push('cost-'+new_cost);
                    $('#tl-'+tempStart[0]+'-'+i).attr("onmouseover",'show_cost("'+new_cost+'","'+tempStart[0]+'-'+i+'");');
                    isNotNull = "";
                }else{
                    isNotNull = "-first";
                }
            }
            show_cost(new_cost,day);
        }else{
            $('#tl-'+tempStart[0]+'-'+day).append('<div class="tl-event-first tl-type-0" id="tle-'+tempStart[0]+'-'+day+'" style="top:-18px;background-color: #74b749;"></div>');
            edited_rooms[tempStart[0]].push(day);
            edited_rooms[tempStart[0]].push('cost-'+new_cost);
            $('#tl-'+tempStart[0]+'-'+day).attr("onmouseover",'show_cost("'+new_cost+'","'+tempStart[0]+'-'+day+'");');
            for(var i=day+1;i<=tempStart[1];i++){
                if(!$('#tle-'+tempStart[0]+'-'+i).hasClass("tl-type-0") && !$('#tle-'+tempStart[0]+'-'+i).hasClass("tl-type-1")){
                    $('#tl-'+tempStart[0]+'-'+i).append('<div class="tl-event'+isNotNull+' tl-type-0" id="tle-'+tempStart[0]+'-'+i+'" style="top:-18px;background-color: #74b749;"></div>');
                    edited_rooms[tempStart[0]].push(i);
                    edited_rooms[tempStart[0]].push('cost-'+new_cost);
                    $('#tl-'+tempStart[0]+'-'+i).attr("onmouseover",'show_cost("'+new_cost+'","'+tempStart[0]+'-'+i+'");');
                    isNotNull = "";
                }else{
                    isNotNull = "-first";
                }
                //alert("2-"+i);
            }
            show_cost(new_cost,tempStart[1]);
        }
    }
}
function tl_emptyOrNot(roomId,day){
    var new_cost = parseInt($("#tl_cost_for_day").val());
    //remove point
    if($('#tle-'+roomId+'-'+day).hasClass("tl-type-0")){
        //before a point
        if($('#tle-'+roomId+'-'+(day+1)).attr("style") != undefined){
            $('#tle-'+roomId+'-'+(day+1)).removeClass("tl-event");
            $('#tle-'+roomId+'-'+(day+1)).addClass("tl-event-first");
            $('#tle-'+roomId+'-'+day).remove();

        }else{
            $('#tle-'+roomId+'-'+day).remove();
        }
        $('#tl-'+roomId+'-'+day).attr("onmouseover",'show_cost("","'+roomId+'-'+day+'");');
        var temp_empty_rooms = empty_rooms[roomId];
        var indexRoomDayEdited = temp_empty_rooms.indexOf(day.toString());
        if(indexRoomDayEdited >= 0){
            temp_empty_rooms.splice(indexRoomDayEdited,1);
            deleted_rooms[roomId].push(day);
            deleted_rooms[roomId].sort(function(a,b){return a-b});
        }
        empty_rooms[roomId] = temp_empty_rooms;

        var temp_edited_rooms = edited_rooms[roomId];
        indexRoomDayEditedNew = temp_edited_rooms.indexOf(day);
        if(indexRoomDayEditedNew >= 0){
            temp_edited_rooms.splice(indexRoomDayEditedNew,2);
        }
        edited_rooms[roomId] = temp_edited_rooms;
        //add point
    }else if($('#tle-'+roomId+'-'+day).attr("style") == undefined){
        //between to point
        if($('#tle-'+roomId+'-'+(day+1)).hasClass("tl-type-0") && $('#tle-'+roomId+'-'+(day-1)).hasClass("tl-type-0")){
            $('#tle-'+roomId+'-'+(day+1)).removeClass("tl-event-first");
            $('#tle-'+roomId+'-'+(day+1)).addClass("tl-event");
            $('#tl-'+roomId+'-'+day).append('<div class="tl-event tl-type-0" id="tle-'+roomId+'-'+day+'" style="top:-18px;background-color: #74b749;"></div>');

            //before a point
        }else if($('#tle-'+roomId+'-'+(day+1)).hasClass("tl-type-0")){
            $('#tle-'+roomId+'-'+(day+1)).removeClass("tl-event-first");
            $('#tle-'+roomId+'-'+(day+1)).addClass("tl-event");
            $('#tl-'+roomId+'-'+day).append('<div class="tl-event-first tl-type-0" id="tle-'+roomId+'-'+day+'" style="top:-18px;background-color: #74b749;"></div>');

            //after a point
        }else if($('#tle-'+roomId+'-'+(day-1)).hasClass("tl-type-0")){
            $('#tl-'+roomId+'-'+day).append('<div class="tl-event tl-type-0" id="tle-'+roomId+'-'+day+'" style="top:-18px;background-color: #74b749;"></div>');

            //point is alone
        }else{
            $('#tl-'+roomId+'-'+day).append('<div class="tl-event-first tl-type-0" id="tle-'+roomId+'-'+day+'" style="top:-18px;background-color: #74b749;"></div>');
        }
        //alert(edited_rooms[roomId].indexOf(day));
        //if(edited_rooms[roomId].indexOf(day) >= 0){
            edited_rooms[roomId].push(day);
            edited_rooms[roomId].push('cost-'+new_cost);
        //}
        $('#tl-'+roomId+'-'+day).attr("onmouseover",'show_cost("قیمت: <br />'+new_cost+' ریال","'+roomId+'-'+day+'");');
        show_cost(new_cost,day);
    }

}

function show_cost(cost,id){
    $("#tl_showCost").html(cost);
    $(".tl-data").css("backgroundColor",'transparent');
    $('#tl-'+id).css("backgroundColor",'#ddddff');
}
function show_detail_full(detail,room,day,width_balloon){
    //alert(detail);
    $("#tl_showCost").html(detail);
    $(".tl-data").css("backgroundColor",'transparent');
    for(i=0;i<width_balloon;i++){
    $('#tl-'+room+'-'+(day+i)).css("backgroundColor",'#ddddff');
    }
}

function create_array_new_emptys(){
    editedRoomsString = "{";
    deletedRoomsString = "{";
    for(singleRoomId in roomIds){
        //editedRoomsString
        editedRoomsString += '"'+roomIds[singleRoomId]+'": { ';
        var length_editedDay = edited_rooms[roomIds[singleRoomId]].length;
        for(var i=0; i<length_editedDay;i=i+2){
            editedRoomsString += '"'+edited_rooms[roomIds[singleRoomId]][i]+'":'+edited_rooms[roomIds[singleRoomId]][i+1].substr(5)+',';
        }
        editedRoomsString = editedRoomsString.substr(0,editedRoomsString.length-1);
        editedRoomsString += '}, ';

        //deletedRoomsString
        deletedRoomsString += '"'+roomIds[singleRoomId]+'": [ '+deleted_rooms[roomIds[singleRoomId]].valueOf() + '], ';
    }
    //editedRoomsString
    editedRoomsString = editedRoomsString.substr(0,editedRoomsString.length-2);
    editedRoomsString += "}";

    //deletedRoomsString
    deletedRoomsString = deletedRoomsString.substr(0,deletedRoomsString.length-2);
    deletedRoomsString += "}";

    //toForm
    $("#tl_hidden_add").val(editedRoomsString);
    $("#tl_hidden_del").val(deletedRoomsString);
    $("#tl_form").submit();
}
