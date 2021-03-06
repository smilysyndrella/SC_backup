  @extends('layouts.profileMaster')
   @section('title')
    <title>Profile | Member Platform | Startups Club</title> 
   @stop
  @section('header')
@include('layouts.header')
@stop
@include('layouts.footer')
  @section('footer')
  @stop
   @section('content')
   <!-- Begin page content -->
    <?php 
/*  echo '<pre>';
    print_r($details); 
    echo '</pre>';
    die;  */
    ?>
    <br> 
    <br>
    <div class="col-md-8" id="app1" ng-app="Profile" ng-controller="postCtrl">
          <div class="row">
            <!-- left posts-->
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                 <input type="hidden" id="user_id"  value="{{ session()->get('userid') }}"> 
                 <input type="hidden" id="role"  value="{{ session()->get('role') }}"> 
                  <input type="hidden" id="display_user" value="{{ $details['id'] }}">
                  <?php  if($details['user_id'] == session()->get('userid')){ ?>
                <!-- post state form -->
                  <div class="box profile-info n-border-top">
                    <form>
                        <textarea ng-model="post" class="form-control input-lg p-text-area post_field role_monitization" rows="2" placeholder="Share your startup experiences."></textarea>
                    </form>
                    <div class="box-footer box-form">
                        <button type="button" class="btn btn-azure pull-right" ng-click="putPost()" ng-disabled="!post" >Post</button>
                        <ul class="nav nav-pills">
                          
                        </ul>
                    </div>
                  </div><!-- end post state form -->
                  <?php } ?>
                  <div id="posts_append_data">
<?php foreach ($details['posts'] as $key => $value) {

  # code... 
 ?>
                  <!--   posts -->
                  <div class="box box-widget profile-div">
                    <div class="box-header with-border">
                      <div class="user-block">
                        <img class="img-circle" src="<?php echo $details['sc_profile_pic']; ?>" alt="User Image">
                        <span class="username"><a href="<?php echo '/profile/'.$value['post']['sc_unique_name'] ?>">{{ $details['sc_fullname'] }}</a> <?php if($value['post']['role'] != 'regular'){ ?><img data-toggle="tooltip" title="{{ get_title($value['post']['role']) }}" class="badge_logo" src="{{ get_logo($value['post']['role']) }}" alt="User Image"><?php } ?><?php if($value['post']['post_author'] == session()->get('userid')){ ?>
                     
  <a class="pull-right"  > 
                          <div class="dropdown">
    <div  type="button dropdown-toggle" class="btn-lg" data-toggle="dropdown">

   <span class="caret" style="cursor:pointer;"></span></div>

   <ul class="dropdown-menu dropdown-menu-right " style="text-align: center" >

     <li>
      <div data-post="{{ $value['post']['post_id'] }}" onclick="delete_post(this)" ><b style="cursor:pointer;">Delete</b></div></li>

     

   </ul> 
  </div></a>
                          <?php } ?></span>
                        <span class="description">{{ time_elapsed_string($value['post']['posted_date']) }}</span>
                        <span></span>
                       
                      </div>
                    </div>

                    <div class="box-body" style="display: block;">
                     
                    <p>{!! html_entity_decode($value['post']['post']) !!}</p>
                            <button data-html="true" data-toggle="tooltip" title="<?php foreach ($value['likes'] as $like_key => $like_value) {
                        if(session()->get('userid') != $like_value['id'] ){
                          echo $like_value['sc_fullname'].'<br>';
                        }
                        
                      }
                                 if(in_array(session()->get('userid'), array_column($value['likes'],'id'))==1){
                                  echo 'You';
                                 }

                      ?>" type="button" data-member="{{ $value['post']['post_author'] }}" data-count="{{ count($value['likes']) }}" data-post="{{ $value['post']['post_id'] }}" onclick="like_button(this)" class="btn btn-default btn-xs <?php echo !empty(in_array(session()->get('userid'), array_column($value['likes'],'id')))?'liked':'' ?>" ><i class="fa fa-thumbs-o-up"></i> Like (<span class="like_count">{{ count($value['likes']) }}</span>)
                    </button>
                      <span class="pull-right text-muted"><span id="display_count"><?php  echo (!empty($value['comments']))?count($value['comments']):'0';  ?></span> comments</span>
                    </div>
                    <div class="comments_append_data<?php echo $value['post']['post_id'] ?>">
       
                    <div class="box-footer box-comments" style="display: block;">
                   <?php   if(count($value['comments']) > 3){ ?>
                      <a data-post="<?php echo $value['post']['post_id'] ?>" onclick="view_all_comments(this)" >view all {{ count($value['comments']) }} comments</a>
                      <?php } ?>
                      <?php 
                    
  foreach (array_slice($value['comments'], -3, 3, true) as $ckey => $cvalue) { 


if(!empty($cvalue)){
                       
                        ?>
                      <div class="box-comment">
                        <img class="img-circle img-sm" src="{{ $cvalue['sc_profile_pic'] }}" alt="User Image">
                        <div class="comment-text">
                          <span class="username">
                        <a href="<?php echo '/profile/'.$cvalue['sc_unique_name'] ?>">
                          {{ $cvalue['sc_fullname'] }}</a>
                          <span class="text-muted pull-right">{{ time_elapsed_string($cvalue['commented_date']) }}</span>
                          </span>
                          {!! html_entity_decode($cvalue['sc_comments']) !!}
                        <?php  if($cvalue['sc_user'] == session()->get('userid')){ ?>
                        <a><br><div data-post="{{ $cvalue['comment_id'] }}" data-parent="<?php echo $value['post']['post_id'] ?>" onclick="delete_comment(this)" class=" icon-remove-sign" style="font-size: 10px;cursor: pointer" >Delete</div></a> 
                      
                        <?php } ?>
                        </div>
                      </div>

                 
                    <?php }  } ?>
                       </div>
                  </div>
                    <div class="box-footer" style="display: block;">
                  
                        <img class="img-responsive img-circle img-sm" src="<?php echo session()->get('profile_pic'); ?>" alt="Alt Text">
                         <div class="img-push  addcomment">

                         <textarea rows="1" cols="60" type="text" data-post="{{ $value['post']['post_id'] }}" class="comment_field" placeholder="Press enter to post comment"></textarea>

                       <button type="button" data-post="{{ $value['post']['post_id'] }}" onclick="comment_post_enter(this)" data-member="{{ $value['post']['post_author'] }}" class="btn btn-default btn-xs sendbtn">  send </button>

                       </div>
                    
                    </div>
                  </div><!--  end posts-->

<?php  } ?>
                 
                </div>
                </div>
              </div>
            </div><!-- end left posts-->
          </div>
        </div><!-- end  center posts -->


    @stop