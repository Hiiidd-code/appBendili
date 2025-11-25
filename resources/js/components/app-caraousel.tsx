import Autoplay from "embla-carousel-autoplay"
import {
    Carousel,
    CarouselContent,
    CarouselItem,
} from "@/components/ui/carousel-custom"


export function Caraousel() {
    return (
        <Carousel
            plugins={[
                Autoplay({
                    delay: 2000,
                }),
            ]}

            opts={{
                
                    align: "start",
                    loop: true,
                }}
            className="w-full h-fit max-w-sm min-w-xs">

            <CarouselContent>
                <CarouselItem><img src="public/images/caraousel-a/img1.jpg" alt="Image" /></CarouselItem>
                <CarouselItem><img src="public/images/caraousel-a/img2.jpg" alt="Image" /></CarouselItem>
                <CarouselItem><img src="public/images/caraousel-a/img3.jpg" alt="Image" /></CarouselItem>
                <CarouselItem><img src="public/images/caraousel-a/img4.jpg" alt="Image" /></CarouselItem>
                <CarouselItem><img src="public/images/caraousel-a/img5.jpg" alt="Image" /></CarouselItem>
            </CarouselContent>
        </Carousel>
    )
}