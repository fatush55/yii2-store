$(() => {
   $('body').on('click', '.btn_add_cart', function (event) {
      event.preventDefault();
      $.ajax({
         url: '/cart/add',
         method: 'get',
         data: {id: $(this).data('id')},
         success(answer) { action(answer) },
         error() { console.log('error - add- cart') },
      });

      function action(answer) {
         $('#cart .modal-body').html(answer);
         answer.length > 50 && $('#sum-on-cart').html($('#sum-inside-cart').text());
         $('#cart').modal();
      }
   });

   $('.cart-btn').on('click', () => {
      $.ajax({
         url: '/cart/show',
         method: 'get',
         success(answer) { $('#cart .modal-body').html(answer); },
         error() { console.log('error - add- cart') },
      });
   });

   $('#cart').on('click', '.remove_prod_of_cart', function () {
      const btn = $(this);

      $.ajax({
         url: '/cart/remove',
         method: 'get',
         data: {id: btn.data('id')},
         success(data) {
            if (!data.sum) {
               $('#cart .modal-body').html('<div> Cart it is empty</div>')
               $('#sum-on-cart').html(0);
               document.location.pathname === '/cart/view' && $('.banner').html('<div> Product is fount</div>');
            } else {
               btn.parent().parent().parent().remove()
               $('#sum-inside-cart').html(data.sum)
               $('#count-inside-cart').html(data.count)
               $('#sum-on-cart').html(data.sum);
               if (document.location.pathname === '/cart/view') {
                  $(`.remove_prod_of_checkout[data-id="${btn.data('id')}"]`)
                      .parent().parent().parent().remove();

                  $('#checkout-sum').html(data.sum)
                  $('#checkout-count').html(data.count)
                  $('.count-prod-123').html(data.count);
               }
            }
         },
         error() { console.log('error - add- cart') },
      });
   })

   $('#cart').on('click', '.cart-clear', function () {
      $.ajax({
         url: '/cart/clear',
         method: 'get',
         success() {
            $('#sum-on-cart').html(0)
            document.location.pathname === '/cart/view' && $('.banner').html('<div> Product is fount</div>');
         },
         error() { console.log('error - add- cart') },
      });
   })

   $('#cart').on('click', '.up_prod_of_cart', function () {
      const btn = $(this);
      $.ajax({
         url: '/cart/count-up',
         method: 'get',
         data: {id:  btn.data('id')},
         success(data) {
            btn.parent().find('span').html(data.countProduct)
            $('#sum-inside-cart').html(data.sum)
            $('#count-inside-cart').html(data.count)
            $('#sum-on-cart').html(data.sum)
            if (document.location.pathname === '/cart/view') {
               $('#checkout-sum').html(data.sum)
               $('#checkout-count').html(data.count)
               $('.count-prod-123').html(data.count);
            }
         },
         error() { console.log('error - add- cart') },
      });
   })

   $('#cart').on('click', '.down_prod_of_cart', function () {
      const btn = $(this);
      $.ajax({
         url: '/cart/count-down',
         method: 'get',
         data: {id:  btn.data('id')},
         success(data) {
            if (!data.sum) {
               $('#cart .modal-body').html('<div> Cart it is empty</div>')
               $('#sum-on-cart').html(0);
               document.location.pathname === '/cart/view' && $('.banner').html('<div> Product is fount</div>');
            } else {
               btn.parent().find('span').html(data.countProduct)
               $('#sum-inside-cart').html(data.sum)
               $('#count-inside-cart').html(data.count)
               $('#sum-on-cart').html(data.sum);
               if (document.location.pathname === '/cart/view') {
                  $('#checkout-sum').html(data.sum)
                  $('#checkout-count').html(data.count)
                  $('.count-prod-123').html(data.count);
               }
            }
         },
         error() { console.log('error - add- cart') },
      });
   })


   $('body').on('click', '.remove_prod_of_checkout', function () {
      const btn = $(this);
      $.ajax({
         url: '/cart/remove',
         method: 'get',
         data: {id: btn.data('id')},
         success(data) {
            if (!data.sum) {
               $('.banner').html('<div> Product is fount</div>')
               $('#sum-on-cart').html(0);
            } else {
               btn.parent().parent().parent().remove()
               $('#checkout-sum').html(data.sum)
               $('#checkout-count').html(data.count)
               $('#sum-on-cart').html(data.sum);
               $('.count-prod-123').html(data.count);
            }
         },
         error() {
            console.log('error - add- cart')
         }
      })
   });

   $('body').on('click', '.value-plus', function () {
      const btn = $(this);
      $.ajax({
         url: '/cart/count-up',
         method: 'get',
         data: {id:  btn.data('id')},
         success(data) {
            btn.parent().find('.value span').html(data.countProduct)
            $('#checkout-sum').html(data.sum)
            $('#checkout-count').html(data.count)
            $('#sum-on-cart').html(data.sum);
            $('.count-prod-123').html(data.count);
         },
         error() { console.log('error - add- cart') },
      });
   })

   $('body').on('click', '.value-minus', function () {
      const btn = $(this);
      $.ajax({
         url: '/cart/count-down',
         method: 'get',
         data: {id:  btn.data('id')},
         success(data) {
            if (!data.sum) {
               $('.banner').html('<div> Product is fount</div>')
               $('#sum-on-cart').html(0);
            } else {
               btn.parent().find('.value span').html(data.countProduct)
               $('#checkout-sum').html(data.sum)
               $('#checkout-count').html(data.count)
               $('#sum-on-cart').html(data.sum);
               $('.count-prod-123').html(data.count);
            }
         },
         error() { console.log('error - add- cart') },
      });
   })

});
