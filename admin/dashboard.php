<?php
    include 'include/nav.php';
?>
    
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <header class="flex justify-between items-center bg-white shadow p-4 rounded-md">
                <h1 class="text-xl font-bold">Dashboard</h1>
                <button class="md:hidden bg-fuchsia-500 text-white px-4 py-2 rounded" onclick="toggleSidebar()">Menu</button>
            </header>
            
            <section class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-bold">Total Sales</h3>
                    <p class="text-2xl font-semibold text-fuchsia-500">$15,230</p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-bold">Orders</h3>
                    <p class="text-2xl font-semibold text-fuchsia-500">320</p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-bold">Customers</h3>
                    <p class="text-2xl font-semibold text-fuchsia-500">1,245</p>
                </div>
            </section>
        </main>
<?php
    include 'include/footer.php';
?>