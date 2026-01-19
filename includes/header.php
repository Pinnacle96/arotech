<?php
$current = $current ?? '';
$base = 'text-gray-700 hover:text-brandBlue font-medium transition-colors';
$active = 'text-brandBlue font-semibold';
$cls = function ($slug) use ($current, $base, $active) {
  return $slug === $current ? $active : $base;
};
?>
<header class="sticky top-0 z-50 bg-white shadow-lg">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-20">
      <a class="flex items-center gap-3" href="index">
        <img class="h-12 w-auto" src="AROTECH 1.png" alt="Arotech Logo">
        <!-- <span class="text-2xl font-bold gradient-text">Arotech</span> -->
      </a>
      <nav class="hidden lg:flex items-center gap-8 absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <a class="<?php echo $cls('index'); ?>" href="index">Home</a>
        <a class="<?php echo $cls('about'); ?>" href="about">About</a>
        <a class="<?php echo $cls('services'); ?>" href="services">Services</a>
        <a class="<?php echo $cls('projects'); ?>" href="projects">Projects</a>
        <a class="<?php echo $cls('maintenance'); ?>" href="maintenance">Maintenance</a>
        <a class="<?php echo $cls('digital'); ?>" href="digital">Digital</a>
      </nav>
      <div class="flex items-center gap-4">
        <a class="hidden lg:block bg-gradient-to-r from-brandBlue via-brandGray to-brandOrange text-white px-6 py-2 rounded-full font-medium hover-lift" href="contact">Contact</a>
        <button class="lg:hidden bg-transparent px-4 py-2 rounded-lg" onclick="toggleNav()">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>
    <nav id="mobileNav" class="lg:hidden hidden bg-white/80 backdrop-blur-sm absolute top-full left-0 w-full shadow-lg border-t border-white/20 z-50">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <a class="<?php echo $cls('index'); ?> block px-3 py-2" href="index">Home</a>
        <a class="<?php echo $cls('about'); ?> block px-3 py-2" href="about">About</a>
        <a class="<?php echo $cls('services'); ?> block px-3 py-2" href="services">Services</a>
        <a class="<?php echo $cls('projects'); ?> block px-3 py-2" href="projects">Projects</a>
        <a class="<?php echo $cls('maintenance'); ?> block px-3 py-2" href="maintenance">Maintenance</a>
        <a class="<?php echo $cls('digital'); ?> block px-3 py-2" href="digital">Digital</a>
        <a class="block px-3 py-2 bg-gradient-to-r from-brandBlue via-brandGray to-brandOrange text-white rounded-md font-medium" href="contact">Contact</a>
      </div>
    </nav>
  </div>
</header>
