<template>
  <div class="code-wrapper">
    <div class="code-container" @click="focusInput">
      <!-- Реальный инпут -->
      <input
        ref="inputRef"
        type="text"
        v-model="code"
        maxlength="6"
        inputmode="numeric"
        pattern="[0-9]*"
        class="real-input"
        @input="handleInput"
        @focus="onFocus"
        @blur="onBlur"
      />
      
      <!-- Визуальные блоки -->
      <div class="boxes-layer">
        <div 
          v-for="index in 6" 
          :key="index"
          class="box"
          :class="{ 
            'active': isActive(index - 1),
            'gap-after': index === 3 
          }"
        >
          {{ getChar(index - 1) }}
        </div>
      </div>
    </div>
    
    <!-- Дополнительный текст снизу -->
    <div class="resend-text">Отправить снова</div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const emit = defineEmits(['update:modelValue']);

const code = ref('')
const inputRef = ref(null)
const isFocused = ref(false)

const isActive = (index) => {
  return isFocused.value && index === code.value.length
}

const getChar = (index) => {
  return code.value[index] || ''
}

const props = defineProps({
  modelValue: {
    type: String,
    default: ''
  }
})

const handleInput = (e) => {
  let value = e.target.value
  value = value.replace(/\D/g, '')
  if (value.length > 6) {
    value = value.slice(0, 6)
  }
  code.value = value
  
  emit('update:modelValue', value);
}

const onFocus = () => {
  isFocused.value = true
}
const onBlur = () => {
  isFocused.value = false
}


const focusInput = () => {
  inputRef.value?.focus()
}
</script>

<style scoped>
.code-wrapper {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.code-container {
  position: relative;
  height: 120px;
  cursor: text;
  width: 100%;
}

.real-input {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 2;
  background: transparent;
  border: none;
  outline: none;
  color: transparent;
  caret-color: transparent;
  font-size: 24px;
  letter-spacing: 40px;
  padding: 0 10px;
  pointer-events: auto;
}

.boxes-layer {
  position: absolute;
  display: flex;
  gap: 30px;
  top: 0;
  left: 0;
  z-index: 1;
  width: 100%;
  height: 100%;
  pointer-events: none;
}

.box {
  flex: 1;
  height: 100%;
  background: white;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 24px;
  font-weight: 600;
  color: #1a1a1a;
  transition: all 0.2s;
  border: 2px solid transparent;
}

.box.active {
  border-color: #4a90d9;
  box-shadow: 0 2px 12px rgba(74, 144, 217, 0.2);
}

/* Разделитель между 3-й и 4-й ячейкой */
.box.gap-after {
  margin-right: 24px; /* Увеличиваем отступ после 3-го блока */
}

.resend-text {
  color: #8e9bb3;
  font-size: 14px;
  cursor: pointer;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.resend-text:hover {
  color: #4a90d9;
}
</style>