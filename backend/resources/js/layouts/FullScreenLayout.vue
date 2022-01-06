<script setup>
import FullScreenSection from '@/components/FullScreenSection.vue'
</script>
<template>
<FullScreenSection>
   <template #content>
      <router-view />
   </template>
</FullScreenSection>
</template>