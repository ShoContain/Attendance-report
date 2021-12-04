<script setup>
    const props = defineProps({
        title: {
          type: String,
          default: '',
          required: true
        }
      })
</script>

<template>
    <div class="container">
        {{ props.title }}
    </div>
</template>
