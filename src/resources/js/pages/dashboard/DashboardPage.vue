<template>
  <div class="min-h-screen bg-gray-50 font-sans flex flex-col items-center justify-start text-slate-800 relative pb-20">
    
    <!-- Top Status Bar & Header (Simulated) -->
    <header class="w-full max-w-sm bg-gray-50 px-4 pt-2 pb-4 sticky top-0 z-10">

      <!-- User Menu Row -->
      <div class="flex justify-between items-center px-1">
        <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center">
          <svg class="w-5 h-5 text-slate-700" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
        </div>
        <div class="flex flex-col gap-1">
           <div class="w-6 h-0.5 bg-slate-700"></div>
           <div class="w-6 h-0.5 bg-slate-700"></div>
        </div>
      </div>
    </header>

    <!-- Main Scrollable Content -->
    <main class="w-full max-w-sm px-4 flex-1">
      
      <!-- Cards Grid -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-8">
        <!-- 1. Main Score Card -->
        <div class="col-span-1 h-36 bg-white rounded-2xl p-4 flex flex-col justify-center items-start shadow-sm border border-gray-100 relative overflow-hidden">
          <!-- Background Wave effect approximation -->
          <div class="absolute bottom-0 left-0 w-full h-1/2 bg-blue-50/50 rounded-t-full blur-xl"></div>
          
          <span class="text-4xl font-bold text-blue-600 z-10">0<span class="text-sm font-normal text-blue-600">%</span></span>
          <span class="text-[10px] font-bold text-blue-600 uppercase tracking-wide mt-1 z-10">нет баллов</span>
        </div>

        <!-- 2. AMETHYST Card -->
        <div class="col-span-1 h-36 bg-white rounded-2xl p-3 flex flex-col justify-between shadow-sm border border-gray-100 relative">
          <div class="flex justify-between items-start w-full">
            <div class="flex flex-col">
              <span class="text-xl font-bold text-gray-400">3<span class="text-xs font-normal">%</span></span>
              <span class="text-[10px] text-gray-400 uppercase font-semibold">amethyst</span>
            </div>
            <!-- Diamond Icon SVG -->
            <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 24 24"><path d="M12,2L2,7l1.5,9.5L12,22l8.5-5.5L22,7L12,2z M12,4.5l6.5,3L15,10L12,6L9,10L5.5,7.5L12,4.5z M12,12l3-2l-3-4L9,10 L12,12z M12,19.5L5.5,15L8,12l4,3l4-3l2.5,3L12,19.5z"/></svg>
          </div>
          <!-- Progress bar at bottom -->
          <div class="w-full h-0.5 bg-gray-100 rounded-full overflow-hidden">
            <div class="h-full bg-blue-500 w-[3%]"></div>
          </div>
        </div>
        
        <!-- 3. TOPAZ Card -->
        <div class="col-span-1 h-36 bg-white rounded-2xl p-3 flex flex-col justify-between shadow-sm border border-gray-100 relative">
          <div class="flex justify-between items-start w-full">
             <div class="flex flex-col">
              <span class="text-xl font-bold text-gray-400">4<span class="text-xs font-normal">%</span></span>
              <span class="text-[10px] text-gray-400 uppercase font-semibold">topaz</span>
            </div>
            <!-- Hex Icon SVG -->
            <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l-9.5 5.5v9L12 22l9.5-5.5v-9L12 2zm0 2.5l6.5 3.8L12 12.1l-6.5-3.8L12 4.5zm-7 5.7l7 4.1 7-4.1v6.8L12 20.1l-7-4.1v-5.8z"/></svg>
          </div>
          <div class="w-full h-0.5 bg-gray-100 rounded-full overflow-hidden">
            <div class="h-full bg-blue-500 w-[4%]"></div>
          </div>
        </div>
        
        <!-- 4. Empty Placeholder -->
        <div class="col-span-1 h-36 bg-transparent border border-dashed border-gray-200 rounded-2xl flex items-center justify-center">
           <div class="w-8 h-8 rounded-full border-2 border-gray-200 text-gray-300 flex items-center justify-center font-bold">+</div>
        </div>
      </div>

      <!-- Section Title & Progress -->
      <div class="flex justify-between items-baseline mb-1">
        <span class="text-xs font-bold text-slate-700 uppercase tracking-wider">amethyst</span>
      </div>
      <div class="w-full h-1 bg-gray-200 rounded-full mb-1 overflow-hidden">
        <div class="h-full bg-blue-600 w-[5%]"></div>
      </div>
      <div class="flex justify-between text-[10px] text-blue-600 font-medium mb-6">
        <span>0 / 100</span>
      </div>

      <!-- Task Card -->
      <div class="bg-white rounded-3xl p-5 shadow-sm border border-gray-100 mb-6">
        <h3 class="text-sm font-bold text-slate-800 mb-3">Для <span class="uppercase">amethyst</span> добавьте 2 проекта</h3>
        
        <div class="flex gap-4">
          <!-- Icon box -->
          <div class="w-12 h-12 shrink-0 rounded-xl border border-gray-200 flex items-center justify-center">
            <!-- Drawing Icon SVG -->
            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
          </div>
          
          <div>
            <p class="text-xs text-slate-600 leading-tight">
              Проекты должен включать дизайнерскую коллекцию<br>
              LAUFEN (не менее 10 позиций).
            </p>
            <div class="mt-3 text-blue-500 text-xs font-medium flex items-center gap-1 cursor-pointer hover:underline">
              <span>+ 200 баллов</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Spacer to allow scrolling over footer -->
      <div class="h-20"></div>

    </main>

    <!-- Bottom Navigation Bar -->
    <footer class="fixed bottom-0 w-full max-w-md bg-white border-t border-gray-100 rounded-t-[30px] shadow-[0_-5px_20px_rgba(0,0,0,0.05)] px-6 pb-6 pt-2 z-20">
      
      <div class="relative flex justify-between items-end h-16">
        <!-- Center FAB Button Wrapper -->
        <div class="absolute left-1/2 -translate-x-1/2 -top-8">
          <button class="w-14 h-14 bg-blue-600 rounded-full flex items-center justify-center shadow-lg shadow-blue-200 hover:bg-blue-700 transition-colors">
             <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
          </button>
        </div>

        <!-- Left Icons -->
        <div class="flex gap-6 w-1/2 justify-start pl-2 text-gray-400">
           <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>
           
           <!-- Custom Chat Bubble Shape -->
           <div class="relative w-6 h-6">
            <div class="w-6 h-4 bg-gray-400 rounded-lg rounded-br-none"></div>
            <div class="absolute -bottom-1 right-0 w-0 h-0 border-l-[6px] border-l-transparent border-t-[6px] border-t-gray-400 border-r-[6px] border-r-transparent rotate-[-45deg]"></div>
           </div>
        </div>

        <!-- Right Icons -->
        <div class="flex gap-6 w-1/2 justify-end pr-2 text-gray-400">
           <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
           <div class="w-6 h-6 border border-gray-400 rounded-md p-0.5">
              <div class="w-full h-full border border-gray-400 rounded-sm"></div>
           </div>
        </div>
      </div>

    </footer>

  </div>
</template>

<script setup>
// No logic needed for this specific static layout demo
</script>

<style>
/* Optional: Custom scrollbar styling for cleaner look */
::-webkit-scrollbar {
  width: 0px;
  background: transparent;
}
body {
    background-color: #f9fafb;
}
</style>