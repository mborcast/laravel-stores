function build(sale) {
  return '<div class="sales-item">'+
          '<aside>'+
            '<p class="date">'+(new Date(sale.date)).toLocaleDateString("en-GB", { year: 'numeric', month: 'short', day: 'numeric' })+'</p>'+
            '<p class="units">'+
              '<i class="fas fa-box-open"></i>'+
              '<span class="times">'+
                '<i class="fas fa-times"></i>'+
              '</span>'+
              sale.products[0].pivot.units+
            '</p>'+
            '<p class="product">'+sale.products[0].name+'</p>'+
            '<p class="store">'+sale.store.name+'</p>'+
            '<p class="customer">'+sale.customer.name+'</p>'+
          '</aside>'+
          '<a href="sales/'+sale.id+'">'+
            '<button type="button" class="mini button primary"><i class="fas fa-eye"></i></button>'+
          '</a>'+
          '<label class="control">'+
            '<input type="checkbox" name="deleted[]" value="{{$sale->id}}">'+
            '<div class="control-indicator"></div>'+
          '</label>'+
        '</div>';
}