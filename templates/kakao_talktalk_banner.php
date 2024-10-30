<?php //고정형 카카오톡 채널 버튼 ?>
<a class="plus-friend-global-button" href="javascript:void plusFriendGlobalChat()">
    <?php if ( 'default' == get_option( 'msntt_plus_friends_global_talk_button_type', 'default' ) ) : ?>
        <img src="<?php echo $button_image_url; ?>" alt="mshop plus friend talk" width="96" height="44"/>
    <?php else: ?>
        <img src="<?php echo $button_image_url; ?>" alt="mshop plus friend talk"/>
    <?php endif; ?>
</a>