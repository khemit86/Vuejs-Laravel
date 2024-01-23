<template>
	<div>
    <slot name="adminheader"><adminheader/></slot>
    <slot name="adminsidebar"><adminsidebar/></slot>  
	<slot name="adminbody"></slot>
	<FlashMessage :position="'right bottom'"></FlashMessage>
    </div>
</template>

<script>
	import adminheader from '../includes/adminheader.vue'; 
	import adminsidebar from '../includes/adminsidebar.vue';	
	export default {
		components:
		{
			adminheader,
			adminsidebar,
	
		}
	}
</script>