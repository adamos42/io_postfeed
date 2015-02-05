<div id="maincolumn" class="shoutbox">
 
    <h2 class="main shoutbox">
      <?php echo lang('module_shoutbox_title'); ?>
      
      <div style="float: right">
      
         <span class="shoutbox-version"> v<?=$config['version']?> </span>
      
         <a href="https://github.com/adamos42/io_ajax_shoutbox" target="_blank">
            <span class="github-icon"></span>
         </a>
      </div>
    </h2>
    
    <!-- Tabs -->
	 <div id="forumTab" class="mainTabs">
		<ul class="tab-menu">
			<li><a><?php echo lang('module_shoutbox_overview'); ?></a></li>
			<li><a><?php echo lang('module_shoutbox_codes'); ?></a></li>
			<li><a><?php echo lang('module_shoutbox_settings'); ?></a></li>
		</ul>
		<div class="clear"></div>
	 </div>
    
    <div id="forumTabContent">

		<!-- Theme views -->
		<div class="tabcontent" style="padding: 10px">
		   
		   <ul class="postsPanelList list mb20 mt10">
 
             <?php foreach($posts as $post) :?>
          
             <?php $id = $post->user_id; ?>
          
             <li class="post_<?php echo $id ?> pointer" id="post_<?php echo $id ?>" data-id="<?php echo $id ?>">
                           
                 <span style="padding: 0 10px"><span style="color: #888">[<?= date("Y.m.d H:i",$post->time)?>]</span> <a><?=$post->username ?></a>: <?php echo $post->message ?> <a class="icon edit right"></a> <span style="float: right; color: #aaa; margin-right: 5px"> (<?=$post->code?>) </span> </span>
                 
             </li>
          
             <?php endforeach ;?>
          
         </ul>
		
		</div>
		
		<div class="tabcontent">
		
		   <ul class="codesPanelList list mb20 mt10" style="padding: 10px">
 
             <?php foreach($codes as $code) :?>
          
             <?php $id = $code->code; ?>
          
             <li class="code_<?php echo $id ?> pointer" id="code_<?php echo $id ?>" data-id="<?php echo $id ?>">
                           
                 <span style="padding: 0 10px"> <?=$code->code?> <span style="float: right"> <?=$code->posts?> </span> </span>
                 
             </li>
          
             <?php endforeach ;?>
          
         </ul>
		
		</div>
		
		<div class="tabcontent">
		
		</div>
		
   </div>
    
</div>
 
<script type="text/javascript">
 
    // Init the panel toolbox is mandatory
    ION.initToolbox('empty_toolbox');
    
    // Tabs
	new TabSwapper({tabsContainer: 'forumTab', sectionsContainer: 'forumTabContent', selectedClass: 'selected', deselectedClass: '', tabs: 'li', clickers: 'li a', sections: 'div.tabcontent', cookieName: 'forumTab' });
 
</script>
