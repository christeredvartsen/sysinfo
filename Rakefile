require 'date'
require 'digest/md5'
require 'fileutils'
require 'nokogiri'

basedir = "."
build   = "#{basedir}/build"
source  = "#{basedir}/src"

desc "Task used by Jenkins-CI"
task :jenkins => [:prepare, :lint, :composer, :test]

desc "Task used by Travis-CI"
task :travis => [:composer, :test]

desc "Default task"
task :default => [:lint, :composer, :test]

desc "Clean up and create artifact directories"
task :prepare do
  FileUtils.rm_rf build
  FileUtils.mkdir build

  ["coverage", "logs"].each do |d|
    FileUtils.mkdir "#{build}/#{d}"
  end
end

desc "Fetch or update composer.phar and update the dependencies"
task :composer do
  if File.exists?("composer.phar")
    system "php -d \"apc.enable_cli=0\" composer.phar self-update"
  else
    system "curl -s http://getcomposer.org/installer | php -d \"apc.enable_cli=0\""
  end

  system "php -d \"apc.enable_cli=0\" composer.phar --no-ansi update --dev"
end

desc "Check syntax on all php files in the project"
task :lint do
  `git ls-files "*.php"`.split("\n").each do |f|
    begin
      sh %{php -l #{f}}
    rescue Exception
      exit 1
    end
  end
end

desc "Run PHPUnit tests (config in phpunit.xml)"
task :test do
  if ENV["TRAVIS"] == "true"
    puts "Opening phpunit.xml.dist"
    document = Nokogiri::XML(File.open("phpunit.xml.dist"))
    document.xpath("//phpunit/logging").remove

    puts "Writing edited version of phpunit.xml"
    File.open("phpunit.xml", "w+") do |f|
        f.write(document.to_xml)
    end
  end

  if File.exists?("phpunit.xml")
    begin
      sh %{phpunit --verbose -c phpunit.xml}
    rescue Exception
      exit 1
    end
  else
    puts "phpunit.xml does not exist"
    exit 1
  end
end
