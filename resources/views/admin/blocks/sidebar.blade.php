<div class="sidebar sidebar-main sidebar-fixed">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left"><img src="{{url('public/admin/assets/images/placeholder.jpg')}}" class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">Victoria Baker</span>
                        <div class="text-size-mini text-muted">
                            <i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
                        </div>
                    </div>

                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="#"><i class="icon-cog3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <?php $parent=DB::table('admin_menus')->where([['parent_id',0],['publish',1]])->get(); ?>
                    @foreach($parent as $pr)
                    <li>
                        <a href="{{$pr->link}}"><i class="{{$pr->icon}}"></i> <span>{{$pr->name}}</span></a>
                        <?php $childs=DB::table('admin_menus')->where([['parent_id',$pr->id],['publish',1]])->get() ?>
                        @foreach($childs as $child)
                        <ul class="hidden-ul">
                            <li><a href="{{$child->link}}" id="layout2">{{$child->name}}</a></li>
                        </ul>
                            @endforeach
                    </li>
                    @endforeach

                    <!-- /page kits -->

                </ul>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                var activeurl = window.location;
//                alert(activeurl)
                $('a[href="'+activeurl+'"]').parent('li').addClass('active');
                $('.hidden-ul').css('display','')
            });
        </script>
        <!-- /main navigation -->

    </div>
</div>
