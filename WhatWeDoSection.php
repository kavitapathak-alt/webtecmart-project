import Link from 'next/link'
import {
  Sparkles,
  LayoutTemplate,
  Search,
  Share2,
  Megaphone,
  Smartphone,
  type LucideIcon,
} from 'lucide-react'
import Container from './Container'

type Service = {
  id: string
  href: string
  icon: LucideIcon
  title: string
  description: string
}c:\Users\Kavita\Downloads\asp-events-homepage\app\services\digital-business-branding

const services: Service[] = [
  {
    id: 'branding',
    href: '/services/digital-business-branding',
    icon: Sparkles,
    title: 'Digital Business Branding',
    description:
      "A digital business only grows when it's positioned the right way. Branding sits at the heart of that growth, and our marketing experts craft well-framed campaigns that build a strong, memorable identity for your brand.",
  },
  {
    id: 'website',
    href: '/services/website-design-development',
    icon: LayoutTemplate,
    title: 'Website Design & Development',
    description:
      'First impressions matter online, and we help make yours memorable and robust. With the right mix of content and visuals, we build responsive, easy-to-use websites that work as hard as you do.',
  },
  {
    id: 'seo',
    href: '/services/search-engine-optimization',
    icon: Search,
    title: 'Search Engine Optimization',
    description:
      "Nearly 75% of online users never go past the first page of search results, which makes ranking there essential for any business. Our SEO strategies work with Google's algorithm to help your pages climb higher and stay visible.",
  },
  {
    id: 'smo',
    href: '/services/social-media-optimization',
    icon: Share2,
    title: 'Social Media Optimization',
    description:
      "Audiences today are looking for content that speaks to them. We create engaging, innovative social media campaigns that keep your brand part of the conversation and your audience coming back for more.",
  },
  {
    id: 'sem',
    href: '/services/search-engine-marketing',
    icon: Megaphone,
    title: 'Search Engine Marketing',
    description:
      "Paid advertisements on search engine result pages remain one of the fastest ways to get noticed. Our experienced team builds strategies that can double a business's visibility through smart, targeted SERP campaigns.",
  },
  {
    id: 'app',
    href: '/services/mobile-app-development',
    icon: Smartphone,
    title: 'Performance Marketingt',
    description:
      "With 2 million+ mobile users and growing, having an app is no longer optional — it's expected. We build easy-to-use, on-trend apps that help businesses meet their customers right where they are.",
  },
]

export default function WhatWeDoSection() {
  return (
    <section className="w-full bg-white py-16 md:py-20">
      <Container>
        <div className="mx-auto mb-12 max-w-2xl text-center md:mb-16">
          <p className="mb-3 inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.25em] text-[#C4007A]">
            <span className="h-1.5 w-1.5 rounded-full bg-[#C4007A]" />
            What We Do
          </p>
          <h2 className="font-serif text-3xl font-black text-gray-900 sm:text-4xl md:text-5xl">
            Development Services Offered by Us
          </h2>
        </div>

        <div className="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
          {services.map((service) => {
            const Icon = service.icon
            return (
              <Link
                key={service.id}
                href={service.href}
                className="group rounded-2xl border border-gray-100 bg-[#FBF8F1] p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-black/5"
              >
                <span className="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-black transition-colors duration-300 group-hover:bg-[#C4007A]">
                  <Icon className="h-5 w-5 text-[#F9A8D4]" />
                </span>
                <h3 className="mb-3 font-serif text-xl font-bold text-gray-900">
                  {service.title}
                </h3>
                <p className="text-[15px] leading-relaxed text-gray-600">
                  {service.description}
                </p>
              </Link>
            )
          })}
        </div>
      </Container>
    </section>
  )
}