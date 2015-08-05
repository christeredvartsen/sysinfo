require 'date'
require 'digest/md5'
require 'fileutils'
require 'json'

basedir = "."
build   = "#{basedir}/build"
source  = "#{basedir}/src"
tests    = "#{basedir}/tests"

desc "Task used by Jenkins-CI"
task :jenkins => [:prepare, :lint, :installdep, :phpunit]

desc "Task used by Travis-CI"
task :travis => [:installdep, :phpunit]

desc "Run tests"
task :test => [:phpunit]

desc "Default task"
task :default => [:lint, :installdep, :phpunit]

desc "Clean up and create artifact directories"
task :prepare do
  FileUtils.rm_rf build
  FileUtils.mkdir build

  ["coverage", "logs"].each do |d|
    FileUtils.mkdir "#{build}/#{d}"
  end
end

desc "Install dependencies"
task :installdep do
  Rake::Task["install_composer"].invoke
  system "php -d \"apc.enable_cli=0\" composer.phar -n install --prefer-source"
end

desc "Update dependencies"
task :updatedep do
  Rake::Task["install_composer"].invoke
  system "php -d \"apc.enable_cli=0\" composer.phar -n update --prefer-source"
end

desc "Install/update composer itself"
task :install_composer do
  if File.exists?("composer.phar")
    system "php -d \"apc.enable_cli=0\" composer.phar self-update"
  else
    system "curl -s http://getcomposer.org/installer | php -d \"apc.enable_cli=0\""
  end
end

desc "Check syntax on all php files in the project"
task :lint do
  lintCache = "#{basedir}/.lintcache"

  begin
    sums = JSON.parse(IO.read(lintCache))
  rescue Exception => foo
    sums = {}
  end

  `git ls-files "*.php"`.split("\n").each do |f|
    f = File.absolute_path(f)
    md5 = Digest::MD5.hexdigest(File.read(f))

    next if sums[f] == md5

    sums[f] = md5

    begin
      sh %{php -l #{f}}
    rescue Exception
      exit 1
    end
  end

  IO.write(lintCache, JSON.dump(sums))
end

desc "Run PHPUnit tests"
task :phpunit do
  begin
    sh %{vendor/bin/phpunit --verbose -c tests --coverage-html build/coverage --coverage-clover build/logs/clover.xml --log-junit build/logs/junit.xml}
  rescue Exception
    exit 1
  end
end
