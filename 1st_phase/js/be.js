var account_balance=[];
var detailed = [];
detailed['income'] = [];
detailed['expense'] = [];
var i_di = 0;
var i_de = 0;
var un = "";
var toggle_detail = false;
var trans = "";

//console.log(account_balance);

window.addEventListener('load', function() {
    //init to 0
    var att = document.getElementsByTagName('tr');
    //console.log(att);
    var attp = [];
    for(var j in att){
        //console.log(att[j].id);
        if(att[j].id != undefined && att[j].id != '' && account_balance[att[j].id] == undefined){
            account_balance[att[j].id] = 0;
        }
    }
    //hardcoded
    account_balance['salary'] = 400;
    account_balance['scholarship'] = 220;
    account_balance['car'] = -150;
    account_balance['food'] = -90;
    
    detailed['income'][0] = [];
    detailed['income'][1] = [];
    detailed['income'][2] = [];
    detailed['expense'][0] = [];
    detailed['expense'][1] = [];
    detailed['income'][0]['amount'] = 120;
    detailed['income'][0]['date'] = '2016-10-29';
    detailed['income'][0]['description'] = 'Hostess job';
    detailed['income'][0]['trans'] = 'income';
    detailed['income'][0]['category'] = 'salary';
    detailed['income'][1]['amount'] = 280;
    detailed['income'][1]['date'] = '2016-11-04';
    detailed['income'][1]['description'] = 'IT job';
    detailed['income'][1]['trans'] = 'income';
    detailed['income'][1]['category'] = 'salary';
    detailed['income'][2]['amount'] = 220;
    detailed['income'][2]['date'] = '2016-11-08';
    detailed['income'][2]['description'] = 'Zois scholarship';
    detailed['income'][2]['trans'] = 'income';
    detailed['income'][2]['category'] = 'scholarship';
    detailed['expense'][0]['amount'] = -150;
    detailed['expense'][0]['date'] = '2016-10-22';
    detailed['expense'][0]['description'] = 'Engine trouble';
    detailed['expense'][0]['trans'] = 'expense';
    detailed['expense'][0]['category'] = 'car';
    detailed['expense'][1]['amount'] = -90;
    detailed['expense'][1]['date'] = '2016-10-29';
    detailed['expense'][1]['description'] = 'Groceries - October';
    detailed['expense'][1]['trans'] = 'expense';
    detailed['expense'][1]['category'] = 'food';
    i_di = 3;
    i_de = 2;
    
    //console.log(att);
    //hardcoded
    var s = document.getElementById('spreadsheet');
    //console.log(s);
    var x = 0;
    for (var i in account_balance){
        //console.log(i);
        var node = document.getElementById(i);
        if (node.children[1].className != 'number'){
            node.children[1].className = 'number';
        }
        
        //console.log(node.children);
        if(i == 'total-exp' || i == 'total-inc'){
            //console.log(x);
            node.children[1].innerHTML = x;
            x = 0;
        }
        else{
            node.children[1].innerHTML += account_balance[i];
            x+=account_balance[i];
        } 
        //console.log(node);
        //console.log(x);
    }
    
    
    //detailed_view();
});



//update_spreadsheet(account_balance);
function update_spreadsheet(arr){
    account_balance[arr['category']] += arr['amount'];
    //console.log(account_balance);
    //console.log(arr);
    if(arr['category'] == "other"){
        arr['category'] = "other-"+ (arr['trans']).substring(0,3);
    }
    //console.log(arr['category']);
    //console.log(document.getElementById(arr['category']))
    var a = document.getElementById(arr['category']).children[1].innerHTML;
    a = parseFloat(a) + parseFloat(arr['amount']);
    document.getElementById(arr['category']).children[1].innerHTML = a;
    var tot_i = 'total-'+ (arr['trans']).substring(0,3);
    //console.log(tot_i);
    var tot = document.getElementById(tot_i).children[1].innerHTML;
    tot = parseFloat(tot)+ parseFloat(arr['amount']);
    document.getElementById(tot_i).children[1].innerHTML = tot;
    detailed[arr['trans']][(detailed[arr['trans']]).length] = arr;
    //i_d++;
}


function transaction_type(t){
    var i = document.getElementById('income-category');
    var e = document.getElementById('expense-category');
    if (t == 0){
        i.style.display = 'inline';
        e.style.display = 'none';
        i.disabled = false;
        e.disabled = true;
        trans = 'income';
    }
    else{
        i.style.display = 'none';
        e.style.display = 'inline';
        i.disabled = true;
        e.disabled = false;
        trans='expense';
    }
    
}

function add_trans(){
    var input = [];
    //input['trans'] = 'expense'
    var form = document.getElementsByName('in-out');
    input['amount'] = form.item(0)['amount'].value;
    input['date'] = form.item(0)['date'].value;
    input['description'] = form.item(0)['description'].value;
    input['trans'] = form.item(0)['radioTr'].value;
    //console.log(form.item(0).children.);
    if(input['trans'] == "" || input['trans'] == undefined){
        input['trans'] = trans;
    }
    if (input['trans'] == 'income'){
        input['category'] = form.item(0)['category'][1].value;
    }
    else{
        input['category'] = form.item(0)['category'][0].value;
        input['amount'] = -input['amount'];
        
    }
    //console.log(input)
    update_spreadsheet(input)
    //console.log(detailed);
    form[0].reset();
    document.getElementById('income-category').disabled = true;
    document.getElementById('expense-category').disabled = true;
    
}

function detailed_view(){
    if(!toggle_detail){
        var s = document.getElementById("spreadsheet");
        var f = document.getElementsByClassName("add-io");
        var s2 = document.getElementById("spreadsheet2");
        //console.log(f);
        s.style.display='none';
        
        f[0].style.display='none';
        
        var parent = s.parentElement;
        if(s2 != null && s2 != undefined){
            parent.removeChild(s2);
        }
        var table = document.createElement('table');
        table.setAttribute('id', 'spreadsheet2');
        table.setAttribute('class', 'det-ss');
        
        //header1
        var head1 = document.createElement('thead');
        var r = document.createElement('tr');
        var h = document.createElement('th');
        var text = document.createTextNode('Income');
        h.appendChild(text);
        r.appendChild(h);
        
        for(i = 1; i < 4; i++){
            h = document.createElement('th');
            r.appendChild(h);
        }
        head1.appendChild(r);
        table.appendChild(head1);
        var d;
        //console.log(table);
        
        for(i in detailed['income']){
            r = document.createElement('tr');
            var line = [];
            line[0] = detailed['income'][i]['description'];
            line[1] = detailed['income'][i]['category'];
            line[2] = detailed['income'][i]['amount'] +'$';
            line[3] = detailed['income'][i]['date'];
            //console.log(line);
            for(j in line){
                d = document.createElement('td');
                text = document.createTextNode(line[j]);
                d.appendChild(text);
                r.appendChild(d);
                
            }
            table.appendChild(r);
        }
        
        //header2
        var head2 = document.createElement('thead');
        r = document.createElement('tr');
        h = document.createElement('th');
        text = document.createTextNode('Expense');
        h.appendChild(text);
        r.appendChild(h);
        
        for(i = 1; i < 4; i++){
            h = document.createElement('th');
            r.appendChild(h);
        }
        head2.appendChild(r);
        table.appendChild(head2);
        //console.log(table);
        
        for(i in detailed['expense']){
            r = document.createElement('tr');
            var line = [];
            line[0] = detailed['expense'][i]['description'];
            line[1] = detailed['expense'][i]['category'];
            line[2] = detailed['expense'][i]['amount'] + '$';
            line[3] = detailed['expense'][i]['date'];
            //console.log(line);
            for(j in line){
                d = document.createElement('td');
                text = document.createTextNode(line[j]);
                d.appendChild(text);
                r.appendChild(d);
                
            }
            table.appendChild(r);
        }
        //console.log(table);
        parent.appendChild(table);
        var b = document.getElementsByClassName("details")[0];
        b.style.marginLeft = '30%';
        b.children[0].innerHTML = "Hide detailed view";
    }
    else{
        var s = document.getElementById("spreadsheet");
        var f = document.getElementsByClassName("add-io");
        var s2 = document.getElementById("spreadsheet2");
        var b = document.getElementsByClassName("details")[0];
        b.style.marginLeft = '0';
        //console.log(s);
        s.style.display='inline-table';
        
        f[0].style.display='block';
        var parent = s.parentElement;
        if(s2 != null && s2 != undefined){
            parent.removeChild(s2);
        }
        b.children[0].innerHTML = "Show detailed view";
    }
    toggle_detail = !toggle_detail;
    
}

