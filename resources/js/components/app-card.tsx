import { Button } from "@/components/ui/button"
import {
  Card,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle,
} from "@/components/ui/card"
import { Input } from "@/components/ui/input"
import { Label } from "@/components/ui/label"

export function CardDemo() {
  return (
    <Card className="w-fill h-15 bg-yellow-400 rounded-lg shadow p-6 flex flex-col md:flex-row gap-6 items-center">
      <CardHeader>
        <CardTitle id="text" className="text-2xl md:text-3xl font-bold mb-3 bounce">Selamat Datang di Website Kantor PT. United Tractors Bendili
        </CardTitle>
        <CardDescription>
        <div>
            <p className="text-sm text-gray-600">
                Portal informasi resmi kantor untuk karyawan dan manajemen. 
                Di sini Anda dapat melihat berita terbaru, pengumuman penting, dan akses dokumen kerja yang terhubung dengan Google Drive.
            </p>
        </div>
        </CardDescription>
        <CardContent>
                   <div className="w-40 h-40 rounded-none overflow-hidden flex-shrink-0">
                        <img  id="text" src="{{ asset('images/boss.webp') }}" alt="Pimpinan Kantor"
                         className="w-full h-full object-cover"></img>
                    </div>
        </CardContent>
      </CardHeader>
    </Card>
  )
}
