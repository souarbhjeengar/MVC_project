function confirmmsg(path,msg=''){
    if(!msg){
        msg="Do you really want to delete this record?";
    }
    if(confirm(msg)){
        location.href=path;
    }
}