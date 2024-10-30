<?php //상품 상세 페이지 카카오톡 채널 버튼 ?>
<a href="javascript:void plusFriendProductChat()">
    <?php if ( 'default' == get_option( 'msntt_plus_friends_product_talk_button_type', 'default' ) ) : ?>
        <img src="<?php echo $button_image_url; ?>" alt="mshop plus friend talk" width="96" height="44"/>
    <?php else: ?>
        <img src="<?php echo $button_image_url; ?>" alt="mshop plus friend talk"/>
    <?php endif; ?>
</a>