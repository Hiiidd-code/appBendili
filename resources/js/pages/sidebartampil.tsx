import { SidebarProvider, SidebarTrigger } from "@/components/ui/sidebar-custom"
import { AppSidebar } from "@/components/app-sidebar"

export function Layout({ children }: { children: React.ReactNode }) {
  return (
    <SidebarProvider>
      <AppSidebar />
      <main>
        <SidebarTrigger />
        {children}
      </main>
    </SidebarProvider>
  )
}