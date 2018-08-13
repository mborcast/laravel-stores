function build(store) {
  return '<div class="index-item">'+
          '<aside>'+
            '<span class="index-icon">'+
              '<i class="fas fa-store"></i>'+
            '</span> '+
            '<p>'+store.name+'</p>'+
            '<p class="overview">'+store.customers.length+' customers</p>'+
          '</aside>'+
          '<a href="/stores/'+store.id+'">'+
            '<button type="button" class="mini button primary"><i class="fas fa-eye"></i></button>'+
          '</a>'+
          '<a href="/stores/'+store.id+'/edit">'+
            '<button type="button" class="mini button edit"><i class="fas fa-pencil-alt"></i></button>'+
          '</a>'+
          '<label class="control">'+
            '<input type="checkbox" name="deleted[]" value="'+store.id+'">'+
            '<div class="control-indicator"></div>'+
          '</label>'+
        '</div>';
}