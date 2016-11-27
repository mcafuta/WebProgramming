var tp = '';
function add_goal(){
    var input = [];
    var form = document.getElementsByName('goal');
    input['description'] = form.item(0)['description'].value;
    input['amount'] = form.item(0)['amount'].value;
    input['timePeriod'] = form.item(0)['radioPeriod'].value;
    if(input['timePeriod'] == undefined || input['timePeriod'] == "")
        input['timePeriod'] = tp;
    var today = new Date();
    var due = today;
    //console.log(input['timePeriod'])
    switch (input['timePeriod']) {
        case 'year':
            console.log('y');
            console.log(due.getFullYear());
            due.setFullYear(today.getFullYear()+1);
            break;
        case 'month':
            due.setMonth(today.getMonth()+1);
            break;
        case 'week':
            // code
            due.setDate(today.getDate() + 7);
            break;
        default:
            due = new Date(form.item(0)['date'].value);
    }
    //console.log('duedate:' + due);
    input['date'] = due;
    
    
    var btn = document.createElement('button');
    btn.setAttribute('class', 'goal');
    btn.setAttribute('ondblclick' ,"goal_remove(event)");
    var g = document.createElement('div');
    var desc = document.createElement('p');
    desc.setAttribute('class', 'emp');
    var t = document.createTextNode(input['description']);
    desc.appendChild(t);
    g.appendChild(desc);
    var am = document.createElement('p');
    t = document.createTextNode('To save: ');
    am.appendChild(t);
    var b = document.createElement('text');
    b.setAttribute('class', 'emp');
    t = document.createTextNode(input['amount'] + '$');
    b.appendChild(t);
    am.appendChild(b);
    g.appendChild(am);
    var duedate = document.createElement('p');
    t = document.createTextNode('Due: ');
    duedate.appendChild(t);
    b = document.createElement('text');
    b.setAttribute('class', 'emp');
    t = document.createTextNode(input['date'].toISOString().slice(0,10));
    b.appendChild(t);
    duedate.appendChild(b);
    g.appendChild(duedate);
    btn.appendChild(g);
    //console.log(btn)
    
    var goals = document.getElementById('current-goals');
    var list = document.getElementsByClassName('goal');
    //console.log(list.children);
    //console.log(goals);
    for (var i=0; i< list.length; i++){
        //console.log(list[i].children[0]);
        var comp = new Date(list[i].children[0].children[2].textContent);
        if (comp > due){
        //console.log(comp + " " + due);
            
            goals.insertBefore(btn, list[i]);
            break;
        }
        //console.log(list[i].children[2]);
        if(i == list.length-1){
            goals.appendChild(btn);
        }
    }
    //goals.appendChild(g);
    //console.log(goals.childElementCount)
    if(goals.childElementCount <= 1){
         goals.appendChild(btn);
    }
    
    form[0].reset();
}

function goal_remove(event){
    var goals = document.getElementById('current-goals');
    //console.log(goals)
    var target = event.target;
    //console.log(target);
    //var list = document.getElementsByClassName('goal');
    var list = goals.children;
    for(var i=0; i< list.length; i++){
        if(list[i] == target){
            //console.log(goals.children[i])
            goals.removeChild(goals.children[i]);
            break;
        }
    }
}

function custom_date(enable){
    var c = document.getElementsByClassName('custom');
    //console.log(c);
    if (enable == true){
        for (field in c){
            c.item(field).style.display = 'inline';
            c.item(field).disabled = false;
            
        }
        c[0].children[0].disabled = false;
    }
    else{
        for (field in c){
            c.item(field).value = '';
            c.item(field).style.display = 'none';
            c.item(field).disabled = true;
        }
        tp = enable;
    }
    //console.log(c[0]);
}