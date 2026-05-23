<template>
    <button
        type="button"
        class="w-full rounded-[1.5rem] bg-gradient-to-r from-blue-500 to-indigo-500 px-6 py-4 text-lg font-semibold text-white shadow-lg shadow-blue-500/20 transition hover:from-blue-600 hover:to-indigo-600"
    >
        {{ text }}
    </button>
</template>

<script setup>
   defineProps({
      text: {
         type: String,
         required: true
      }
   })
</script>
