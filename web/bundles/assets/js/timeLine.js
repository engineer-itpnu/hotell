/**
 * Created by Morteza on 11/3/13.
 */
var rows = 1;
function timeline_header(){
    $(".timeLine").append('<div class="tl-title"></div>');
    $(".tl-title").append('<div class="tl-data tl-data-title">عنوان و نوع اتاق</div>');
    for(var i=1;i<=9;i++){
        $(".tl-title").append('<div class="tl-data">0'+i+'</div>');
    }
    for(var i=10;i<=31;i++){
        $(".tl-title").append('<div class="tl-data">'+i+'</div>');
    }
}
function timeline_add_row(roomType,roomNum,tl_events){

    $(".timeLine").append('<div class="tl-row tl-row-'+rows+'"></div>');
    $('.tl-row-'+rows).append('<div class="tl-data tl-data-title"> اتاق '+roomNum+' '+roomType+'</div>');
    for(var i=1;i<=31;i++){
        $('.tl-row-'+rows).append('<div class="tl-data" id="tl-'+rows+'-'+i+'"></div>');
    }

    var types=new Array();
    types[0]="#74b749";
    types[1]="rgb(255,0,0)";
    count_events = tl_events.length;
    for(ev=0;ev<count_events;ev++){
        datas = tl_events[ev][1].split("-");
        count = datas.length;
        type = tl_events[ev][0];
        width_balloon = 25;
        if(count > 1){
            $('#tl-'+rows+'-'+datas[0]).append('<div class="tl-event-first" style="background-color: '+types[type]+';"></div>');
            for(j=1;j<count;j++){
                $('#tl-'+rows+'-'+datas[j]).append('<div class="tl-event" style="background-color: '+types[type]+';"></div>');
                width_balloon+=26;
            }
            $('#tl-'+rows+'-'+datas[0]).append('<div class="tl-over" id="tl-balloon-'+rows+'-'+datas[0]+'" style="width: '+width_balloon+'px" onmouseover="show_balloon(\''+rows+'-'+datas[0]+'\',\''+tl_events[ev][2]+'\');"></div>');
        }else if(count == 1){
            $('#tl-'+rows+'-'+datas[0]).append('<div class="tl-event-first" style="background-color: '+types[type]+';"></div>');
            $('#tl-'+rows+'-'+datas[0]).append('<div class="tl-over" id="tl-balloon-'+rows+'-'+datas[0]+'" style="width: '+width_balloon+'px" onmouseover="show_balloon(\''+rows+'-'+datas[0]+'\',\''+tl_events[ev][2]+'\');"></div>');
        }

    }
    rows++;
}
