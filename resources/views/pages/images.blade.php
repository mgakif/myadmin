<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->
<div class="box-header">  
 
                <div class="pull-left">
                    <div class="selected-action" style="display:inline-block;position:relative;">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false"><i
                                    class='fa fa-check-square-o'></i> Toplu işlem
                            <span class="fa fa-caret-down"></span></button>
                        <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)" data-name='delete'
                                       title='seçilenleri sil'><i
                                                class="fa fa-trash"></i>Seçilenleri sil</a></li>
                          

                            @if($button_selected)
                                @foreach($button_selected as $button)
                                    <li><a href="javascript:void(0)" data-name='{{$button["name"]}}'
                                           title='{{$button["label"]}}'><i
                                                    class="fa fa-{{$button['icon']}}"></i> {{$button['label']}}</a></li>
                                @endforeach
                            @endif

                        </ul><!--end-dropdown-menu-->
                    </div><!--end-selected-action-->
                </div><!--end-pull-left-->
                <div class="box-tools pull-right" style="position: relative;margin-top: -5px;margin-right: -10px">
          
                             <form method='get' style="display:inline-block;width: 260px;" action='{{Request::url()}}'>
                    <div class="input-group">
                        <input type="text" name="q" value="{{ Request::get('q') }}"
                               class="form-control input-sm pull-right"
                               placeholder="ara"/>
                        {!! CRUDBooster::getUrlParameters(['q']) !!}
                        <div class="input-group-btn">
                            @if(Request::get('q'))
                                <?php
                                $parameters = Request::all();
                                unset($parameters['q']);
                                $build_query = urldecode(http_build_query($parameters));
                                $build_query = ($build_query) ? "?".$build_query : "";
                                $build_query = (Request::all()) ? $build_query : "";
                                ?>
                                <button type='button'
                                        onclick='location.href="{{ CRUDBooster::mainpath().$build_query}}"'
                                        title="sıfırla" class='btn btn-sm btn-warning'><i
                                            class='fa fa-ban'></i></button>
                            @endif
                            <button type='submit' class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>


<form method='get' id='form-limit-paging' style="display:inline-block" action='{{Request::url()}}'>

                      <div class="input-group">
                        <select onchange="$('#form-limit-paging').submit()" name='limit' style="width: 75px;"
                                class='form-control input-sm'>
                            <option {{(Request::get('limit')==5)?'selected':''}} value='5'>5</option>
                            <option {{(Request::get('limit')==10||!Request::get('limit'))?'selected':''}} value='10'>10</option>
                            <option {{(Request::get('limit')==20)?'selected':''}} value='20'>20</option>
                            <option {{(Request::get('limit')==25)?'selected':''}} value='25'>25</option>
                            <option {{(Request::get('limit')==50)?'selected':''}} value='50'>50</option>
                            <option {{(Request::get('limit')==100)?'selected':''}} value='100'>100</option>
                            <option {{(Request::get('limit')==200)?'selected':''}} value='200'>200</option>
                        </select>
                    </div>
                </form>

        </div> 

        <br style="clear:both">

      </div>
       <form id='form-table' method='post' action='{{CRUDBooster::mainpath("action-selected")}}'>
    <input type='hidden' name='button_name' value=''/>
    <input type='hidden' name='_token' value='{{csrf_token()}}'/>
<table id="table_dashboard" class='table table-striped table-bordered'>
  <thead>
      <tr>
        <th width="3%"><input type="checkbox" id="checkall"></th>
        <th>Ad</th>
        <th></th>
        <th></th>
       </tr>
  </thead>
  <tbody>
    @foreach($result as $row)
      <tr>
        <td><input type="checkbox" class="checkbox" name="checkbox[]" value="{{$row->id}}"></td>
        <td>{{$row->name}}</td>
        <td>Resimler ({{ count($row->image )}})</td>
        <td>
          <a class='btn btn-warning btn-xs' href="/example-2/hotel/{{$row->id}}"> Resim Ekle</a></td>
        <td>

          
          <!-- To make sure we have read access, wee need to validate the privilege -->
          @if(CRUDBooster::isUpdate() && $button_edit)
          <a class='btn btn-success btn-sm' href='{{CRUDBooster::mainpath("edit/$row->id")}}'>Düzenle</a>
          @endif
          
          @if(CRUDBooster::isDelete() && $button_edit)
          <a class='btn btn-success btn-sm' href='{{CRUDBooster::mainpath("delete/$row->id")}}'>Sil</a>
          @endif
        </td>
       </tr>
    @endforeach
  </tbody>
</table>
</form>
@section('javascript')
            <script type="text/javascript">
                  $(document).ready(function() {                      
                      var $window = $(window);                      
                      function checkWidth() {
                          var windowsize = $window.width();
                          if (windowsize > 500) {
                              console.log(windowsize);
                              $('#box-body-table').removeClass('table-responsive');
                          }else{
                            console.log(windowsize);
                              $('#box-body-table').addClass('table-responsive'); 
                          }
                      }                      
                      checkWidth();                      
                      $(window).resize(checkWidth);

                      $('.selected-action ul li a').click(function() {
                        var name = $(this).data('name');
                        $('#form-table input[name="button_name"]').val(name);
                        var title = $(this).attr('title');

                        swal({
                          title: "Onaylama",
                          text: "Emin misin "+title+" ?",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#008D4C",
                          confirmButtonText: "Evet",
                          closeOnConfirm: false,
                          showLoaderOnConfirm:true
                        },
                        function(){
                          $('#form-table').submit();                          
                        });

                      })

                      $('table tbody tr .button_action a').click(function(e) {
                        e.stopPropagation();
                      })
                  });
                </script>
            <script>
            $(function(){
              $('.btn-filter-data').click(function() {
                $('#filter-data').modal('show');
              })

              $('.btn-export-data').click(function() {
                $('#export-data').modal('show');
              })

              var toggle_advanced_report_boolean = 1;
              $(".toggle_advanced_report").click(function() {
                
                if(toggle_advanced_report_boolean==1) {
                  $("#advanced_export").slideDown();
                  $(this).html("<i class='fa fa-minus-square-o'></i> {{trans('crudbooster.export_dialog_show_advanced')}}");
                  toggle_advanced_report_boolean = 0;
                }else{
                  $("#advanced_export").slideUp();
                  $(this).html("<i class='fa fa-plus-square-o'></i> {{trans('crudbooster.export_dialog_show_advanced')}}");
                  toggle_advanced_report_boolean = 1;
                }   
                
              })


              $("#table_dashboard .checkbox").click(function() {
                var is_any_checked = $("#table_dashboard .checkbox:checked").length;
                if(is_any_checked) {
                  $(".btn-delete-selected").removeClass("disabled");
                }else{
                  $(".btn-delete-selected").addClass("disabled");
                }
              })

              $("#table_dashboard #checkall").click(function() {
                var is_checked = $(this).is(":checked");
                $("#table_dashboard .checkbox").prop("checked",!is_checked).trigger("click");
              })

              $('#btn_advanced_filter').click(function() {
                $('#advanced_filter_modal').modal('show');
              })

              $(".filter-combo").change(function() {                
                var n = $(this).val();
                var p = $(this).parents('.row-filter-combo');
                var type_data = $(this).attr('data-type');
                var filter_value = p.find('.filter-value');

                p.find('.between-group').hide();
                p.find('.between-group').find('input').prop('disabled',true);
                filter_value.val('').show().focus();
                switch(n) {
                  default:
                    filter_value.removeAttr('placeholder').val('').prop('disabled',true);                                                            
                    p.find('.between-group').find('input').prop('disabled',true);
                  break;
                  case 'like':
                  case 'not like':                                                              
                    filter_value.attr('placeholder','{{trans("crudbooster.filter_eg")}} : {{trans("crudbooster.filter_lorem_ipsum")}}').prop('disabled',false);
                  break;
                  case 'asc':                                        
                    filter_value.prop('disabled',true).attr('placeholder','{{trans("crudbooster.filter_sort_ascending")}}');
                  break;
                  case 'desc':                                        
                    filter_value.prop('disabled',true).attr('placeholder','{{trans("crudbooster.filter_sort_descending")}}');
                  break;
                  case '=':                                        
                    filter_value.prop('disabled',false).attr('placeholder','{{trans("crudbooster.filter_eg")}} : {{trans("crudbooster.filter_lorem_ipsum")}}');
                  break;
                  case '>=':                                                
                    filter_value.prop('disabled',false).attr('placeholder','{{trans("crudbooster.filter_eg")}} : 1000');
                  break;
                  case '<=':                                                
                    filter_value.prop('disabled',false).attr('placeholder','{{trans("crudbooster.filter_eg")}} : 1000');
                  break;
                  case '>':                                               
                    filter_value.prop('disabled',false).attr('placeholder','{{trans("crudbooster.filter_eg")}} : 1000');
                  break;
                  case '<':                                               
                    filter_value.prop('disabled',false).attr('placeholder','{{trans("crudbooster.filter_eg")}} : 1000'); 
                  break; 
                  case '!=':                                        
                    filter_value.prop('disabled',false).attr('placeholder','{{trans("crudbooster.filter_eg")}} : {{trans("crudbooster.filter_lorem_ipsum")}}');
                  break;
                  case 'in':                                        
                    filter_value.prop('disabled',false).attr('placeholder','{{trans("crudbooster.filter_eg")}} : {{trans("crudbooster.filter_lorem_ipsum_dolor_sit")}}');
                  break;
                  case 'not in':                                        
                    filter_value.prop('disabled',false).attr('placeholder','{{trans("crudbooster.filter_eg")}} : {{trans("crudbooster.filter_lorem_ipsum_dolor_sit")}}');
                  break;
                  case 'between':       
                    filter_value.val('').hide();
                    p.find('.between-group input').prop('disabled',false);
                    p.find('.between-group').show().focus();
                    p.find('.filter-value-between').prop('disabled',false);                    
                  break;
                }
              })

              /* Remove disabled when reload page and input value is filled */
              $(".filter-value").each(function() {
                var v = $(this).val();
                if(v != '') $(this).prop('disabled',false);
              })
 
            })
            </script>
            @endsection

<!-- ADD A PAGINATION -->
<p>{!! urldecode(str_replace("/?","?",$result->appends(Request::all())->render())) !!}</p>
@endsection